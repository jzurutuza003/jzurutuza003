<?php 
session_start();
?>

<html>
	<head>
		<link rel="STYLESHEET" type="text/css" href="estilos/style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
		<script>
			$(document).ready(function(){	
			// generamos un evento cada vez que se pulse una tecla
			$("#correo").change(function(){
			// enviamos una petición al servidor mediante AJAX enviando el id
			// introducido por el usuario mediante POST
			$variable=$("#correo").val();

			$.getJSON('conseguirPreguntaUsuario.php?Correo='+$variable, {format: "json"}, function(data) { 
				$("#pregunta").val(data.Pregunta);
			});
});



});
</script>
	</head>
	<body>
		<form method="POST" action="conseguirPasswordUsuario.php">
			<div id='login'> 
				<p>Correo:<input type='text' id='correo' name='correo'></p><br>
				<p>Pregunta: <input type='text' id='pregunta'name='pregunta' disabled></p><br>
                <p>Repuesta: <input type='text' id='respuesta'name='respuesta'></p><br>
				
				<p><input type='submit' id='boton' value='Recuperar contraseña'></p>
			</div>
		</form>
	</body>
</html>


