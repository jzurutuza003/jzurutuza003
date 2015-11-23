<?php
$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");
	if(!$usu){
		
	}
	
	if(!mysql_select_db("u878461769_mysql",$usu)){
		
	}
 
$sql="SELECT * from Quiz";
$result = mysql_query($sql); 
 


mysql_close($usu); 
?>
<html>
		<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> Insertar Pregunta </title>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

	<script>
		$(document).ready(function(){
	
		// generamos un evento cada vez que se pulse una tecla
		$("#id").change(function(){
		
			// enviamos una petición al servidor mediante AJAX enviando el id
			// introducido por el usuario mediante POST

			$.post("conseguirPregunta.php", {"Pregunta":$("#id option:selected").val()}, function(data){
			
				// Si devuelve un nombre lo mostramos, si no, vaciamos la casilla
				if(data.Correo)
				$("#Correo").val(data.Correo);
				if(data.Pregunta)
					$("#Pregunta").val(data.Pregunta);
				else
					$("#Pregunta").val("");
					
				// Si devuelve un apellido lo mostramos, si no, vaciamos la casilla
				if(data.Respuesta)
					$("#Respuesta").val(data.Respuesta);
				else
					$("#Respuesta").val("");
				if(data.Tematica)
					$("#Tematica").val(data.Tematica);
				else
					$("#Tematica").val("");
				if(data.Valoracion)
					$("#Valoracion").val(data.Valoracion);
				else
					$("#Valoracion").val("");
},"json");
			
		});
	});

		</script>
		</head>
		<body>
<form method="Post" action="validarPregunta.php">
			<div id='login'> 
				<p id='titulo'> Quiz </p>
				<p id='aj'> Seleccionar pregunta:<SELECT NAME="id" id='id' SIZE=1 > 
<option>Seleeciona una pregunta... </option>
					<?php while ($fila=mysql_fetch_array($result)){ ?>
					<option value="<?php echo $fila['Pregunta']?>"><?php echo $fila['Pregunta']?></option>
				<?php }?>
</SELECT> </p>
				<p id='p2'>Correo: <input type='text' id='Correo'name='Correo' disabled></p>
				<p id='p1'>Pregunta:
					<input type='text' id='Pregunta' name='Pregunta'></p>
				<p id='p2'>Respuesta: <input type='text' id='Respuesta'name='Respuesta'></p>
				<p id='p2'>Temática: <input type='text' id='Tematica'name='Tematica'></p>
				<p id='p4'>Valoracion: <input type='text' id='Valoracion'name='Valoracion'>
									
				</p>
				<p id='p3'><input type='submit' id='boton' value='Actualizar'></p>
</form>
			</div>
		</form>

</body>
</html>