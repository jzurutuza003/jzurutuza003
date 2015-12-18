<?php
session_start();
$pregunta=$_POST['id'];
$respuesta=$_POST['respuesta'];
$_SESSION['preguntas']=$_SESSION['preguntas'] + 1;
$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");
	
	$buscarPregunta = "SELECT * FROM Quiz WHERE Pregunta='$pregunta' AND Respuesta='$respuesta'";
	
  
	$result = $mysqli->query($buscarPregunta); 
	$count = $result->num_rows; 
	if($count>0){
		$_SESSION['aciertos']=$_SESSION['aciertos'] + 1;
	?>
	<script> alert("Has acertado"); location.href="seleccionarPregunta.php"</script> 
			<?php
	}else{
                $_SESSION['fallos']=$_SESSION['fallos'] + 1;
			?>
	<script> alert("Has fallado"); location.href="seleccionarPregunta.php"</script> 
			<?php	
			}
	mysqli_close($mysqli);
?>