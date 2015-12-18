<?php
session_start();

if($_SESSION['tipo']=='2'){
		$original=$_POST['id'];
	$Correo=$_SESSION['correo'];
	$Pregunta=$_POST['Pregunta'];
	$Complejidad=$_POST['Valoracion'];
	$Respuesta=$_POST['Respuesta'];
	$Tematica=$_POST['Tematica'];
	
		$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");
	
	$result = $mysqli->query("SELECT * FROM Quiz WHERE  Pregunta='$original' "); 
	$count = $result->num_rows; 
	
	if($count==0){
		?>
				<script> alert("Pregunta no actualizada"); location.href="RevisarPreguntas.php"</script> 
			<?php
	}else{
if($Complejidad > 0 && $Complejidad < 6){
		$SQL1="UPDATE Quiz SET Pregunta='$Pregunta',Respuesta='$Respuesta' , Complejidad='$Complejidad' , Tematica='$Tematica' WHERE  Pregunta='$original'";
		$mysqli->query($SQL1);

	$xml = simplexml_load_file('preguntas.xml');
        foreach($xml->assessmentItem as $pregunta){
           if($pregunta->itemBody->p == $original){
              $pregunta->itemBody->p=$Pregunta;
              $pregunta->correctResponse->value=$Respuesta;
              $atributos = $pregunta->attributes();
              $atributos['subject']=$Tematica;
              
              $atributos['complexity']=$Complejidad;
           }
        }
	
	if (!$xml->asXML('preguntas.xml'))
	{
		throw new Exception($error);
	}

                        ?>
				<script> alert("Pregunta actualizada correctamente"); location.href="RevisarPreguntas.php"</script> 
			<?php
}else{
 ?>
				<script> alert("La complejidad tiene que ser un numero entre 1 y 5"); location.href="RevisarPreguntas.php"</script> 
			<?php
}
	}	
	mysqli_close($mysqli);	

	
}
?>