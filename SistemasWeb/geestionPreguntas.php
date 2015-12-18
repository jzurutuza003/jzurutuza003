<?php
session_start();
if(isset($_SESSION['correo'])){
?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title> Insertar Pregunta </title>
			<link rel="STYLESHEET" type="text/css" href="estilos/style.css">
			
		</script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
		<script>
			$(document).ready(function(){	
			// generamos un evento cada vez que se pulse una tecla
			$("#boton").click(function(){
				var formData = $("#formulario").serializeArray();
		$.post("insertarPregunta2.php",formData).done(function( data ) {
    alert( data );
  });
});

$("#ajax").click(function(){
				
		$.post("baseDeDatos.php").done(function( data ) {
   $('#insertar').html(data);
  });
});
});
</script>
		
		</head>
		<body>
			<form id='formulario'>
				<div id='login'>
					
					<p id='p1'>Pregunta:<input type='text' id='Correo' name='Pregunta'></p><br>
					<p id='p2'>Respuesta: <input type='text' id='pass'name='Respuesta'></p><br>
					<p id='p2'>Tematica: <input type='text' id='p'name='Tematica'></p><br>
					<p id='p4'>Valoracion: 
									<input type='radio' id='1'name='Valoracion' value=1>1
									<input type='radio' id='2'name='Valoracion'value=2>2
									<input type='radio' id='3'name='Valoracion'value=3>3
									<input type='radio' id='4'name='Valoracion'value=4>4
									<input type='radio' id='5'name='Valoracion'value=5>5
					</p><br>
					<p id='p3'><input type='button' id='boton' value='Insertar' ></p><br>
					<div id='resultado'></div>
					
					<p><input type='button' id='ajax'  value='Visualizar Preguntas'></p>
				</div>
			</form>
		<p></p>
		<p></p>
		<div id='insertar'></div>
	</body>
</html>
<?php
}
?>