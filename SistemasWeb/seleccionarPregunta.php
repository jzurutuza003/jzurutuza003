<?php
session_start();
$nick=$_POST['nick'];
if($_SESSION['nickeado']!=1){
$_SESSION['nick']=$nick;
$_SESSION['preguntas']=0;
$_SESSION['aciertos']=0;
$_SESSION['fallos']=0;
$_SESSION['nickeado']=1;
}
$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");

$result = $mysqli->query("SELECT * from Quiz"); 

$mysqli->close(); 
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
			// enviamos una petici�n al servidor mediante AJAX enviando el id
			// introducido por el usuario mediante POST
			$variable=$("#id").val();

			$.getJSON('conseguirPregunta.php?Pregunta='+$variable, {format: "json"}, function(data) { 
				

				
				if(data.Pregunta)$("#Pregunta").val(data.Pregunta);
				else $("#Pregunta").val("");
					
				// Si devuelve un apellido lo mostramos, si no, vaciamos la casilla
				
				

			},"json");	
			});
			});

		</script>
		</head>
		<body>
<table>
<tr> <td>Nick</td><td>Preguntas respondidas </td> <td>Aciertos</td> <td>Fallos</td> </tr>
<tr> <td><?php echo $_SESSION['nick']; ?> </td> <td> <?php echo $_SESSION['preguntas']; ?> </td> <td> <?php echo $_SESSION['aciertos']; ?> </td> <td> <?php echo $_SESSION['fallos']; ?> </td> </tr> </table>
		<form method="Post" action="responder.php">
			<div id='login'> 

				<p id='aj'> Seleccionar pregunta:
					<SELECT NAME="id" id='id' SIZE=1 > 
						<option>Seleeciona una pregunta... </option>
							<?php while ($fila=$result->fetch_object()){ ?>
								<option value="<?php echo $fila->Pregunta?>">
									<?php echo $fila->Pregunta?>
								</option>
							<?php }?>
					</SELECT> 
				</p>
				<p id='p1'>Pregunta:
				<input type='text' id='Pregunta' disabled></p>
				<p id='p2'>Respuesta: <input type='text' id='Respuesta'name='respuesta'></p>
				<p id='p3'><input type='submit' id='boton' value='Responder'></p>
			</div>
		</form>
	</body>
</html>