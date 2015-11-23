<?php
session_start();
if($_SESSION['tipo']==0){
?>
<html>
		<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> Insertar Pregunta </title>
		<link rel="STYLESHEET" type="text/css"
		href="estilo.css">
		</head>
		<body>
		<div id='formulario'>
			<p><a href='InsertarPreguntas.php'>Insertar Preguntas </a></p>
			<p><a href='VisualizarXml.php'>Visualizar xml de preguntas </a></p>
			<p><a href='geestionPreguntas.php'>Gestionar Preguntas </a></p>
		</div>
			
			

</body>
</html>
<?
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
		<div id='formulario'>
			<p><a href='RevisarPreguntas.php'>Revisar Preguntas </a></p>
			
		</div>
			
			

</body>
</html>
<?
}
?>
