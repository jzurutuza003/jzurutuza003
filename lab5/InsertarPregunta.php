<?php
session_start();
if($_SESSION['logueado']=='1'){
	if(isset($_POST['Pregunta'])){
	try{	
	$Correo=$_SESSION['correo'];
	$Pregunta=$_POST['Pregunta'];
	$Complejidad=$_POST['Valoracion'];
	$Respuesta=$_POST['Respuesta'];
	$Tematica=$_POST['Tematica'];
	
	$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");
	if(!$usu){
		throw new Exception($error);
	}
	
	if(!mysql_select_db("u878461769_mysql",$usu)){
		throw new Exception($error);
	}
	$buscarPregunta = "SELECT * FROM Quiz WHERE  Pregunta=$Pregunta "; 
	$result = mysql_query($buscarPregunta); 
	$count = mysql_num_rows($result); 
	if($count>0){
		echo '<script type="text/javascript"> 
	alert("Pregunta existente en la base de datos");
	</script>';
	}else{
		$tabla="SELECT * FROM Quiz";
		$tabla2=mysql_query($tabla);
		if(!$tabla2){throw new Exception($error);}
		$Numero = mysql_num_rows($tabla2);
		$Numero=$Numero +1;
		$SQL1=" INSERT INTO Quiz VALUES('$Numero', '$Correo','$Pregunta','$Respuesta','$Complejidad','$Tematica')";
		if (!mysql_query($SQL1))
		{
		throw new Exception($error);
		}
		}
		$_SESSION["logueado"]=0;
		mysql_close($usu);
		$xml = simplexml_load_file('preguntas.xml');
		$assessmentItem=$xml->addChild('assessmentItem');
		$itemBody=$assessmentItem->addChild('itemBody');
		$p=$itemBody->addChild('p',$_POST['Pregunta']);
		
		$correctResponse=$assessmentItem->addChild('correctResponse'); 
		$value=$correctResponse->addChild('value',$_POST['Respuesta']); 
		$assessmentItem->addAttribute('complexity',$_POST['Valoracion']);
		$assessmentItem->addAttribute('subject',$_POST['Valoracion']);
		
		if (!$xml->asXML('preguntas.xml') )
		{
		throw new Exception($error);
		}
		echo '<script type="text/javascript"> 
	alert("Se ha introducido la pregunta en la base de datos");
	</script>';
	
	}catch(Exception $error){
		 echo '<script language="javascript">alert("Pregunta no introducida");</script>'; 
		
		
	}
		 echo '<script language="javascript">alert("Pregunta introducida");</script>'; 
		sleep(2);
	header("Location:VisualizarXml.php");
	
		
	}else{
		?>
		
		<html>
		<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> Insertar Pregunta </title>
		<link rel="STYLESHEET" type="text/css"
		href="estilo.css">
		</head>
		<body>

		<form action="InsertarPregunta.php" method="post" id='formulario'>
			<div id='login'> 
				<p id='titulo'> Quiz </p>
				<p id='p1'>Pregunta:
					<input type='text' id='Correo' name='Pregunta'></p>
				<p id='p2'>Respuesta: <input type='text' id='pass'name='Respuesta'></p>
				<p id='p2'>Temática: <input type='text' id='p'name='Tematica'></p>
				<p id='p4'>Valoracion: <input type='radio' id='1'name='Valoracion' value=1>1
									<input type='radio' id='2'name='Valoracion'value=2>2
									<input type='radio' id='3'name='Valoracion'value=3>3
									<input type='radio' id='4'name='Valoracion'value=4>4
									<input type='radio' id='5'name='Valoracion'value=5>5
				</p>
				<p id='p3'><input type='submit' id='boton' value='Insertar'></p>
			</div>
		</form>

</body>
</html>

	<?php	
	}
}else{
	
	header("Location:login.php");
}
?>