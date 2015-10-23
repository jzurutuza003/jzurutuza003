<?php
session_start();
if($_SESSION['logueado']=='1'){
	if(isset($_POST['Pregunta'])){
	$Correo=$_SESSION['correo'];
	$Pregunta=$_POST['Pregunta'];
	$Complejidad=$_POST['Valoracion'];
	$Respuesta=$_POST['Respuesta'];
	
	$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");

	mysql_select_db("u878461769_mysql",$usu);
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
		$Numero = mysql_num_rows($tabla2);
		$Numero=$Numero +1;
		$SQL1=" INSERT INTO Quiz VALUES('$Numero', '$Correo','$Pregunta','$Respuesta','$Complejidad')";
		if (!mysql_query($SQL1))
		{
		die('Error: ' . mysql_error());
		}
		}
		$_SESSION["logueado"]=0;
		mysql_close($usu);
		echo '<script type="text/javascript"> 
	alert("Se ha introducido la pregunta en la base de datos");
	</script>';
	header("Location:visualizarPreguntas.php");
		
	}else{
		?>
		
		<html>
		<head>
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
				<p id='p4'>Valoracion: <input type='radio' id='1'name='Valoracion'>1
									<input type='radio' id='2'name='Valoracion'>2
									<input type='radio' id='3'name='Valoracion'>3
									<input type='radio' id='4'name='Valoracion'>4
									<input type='radio' id='5'name='Valoracion'>5
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