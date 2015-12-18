<?php
session_start();
$correo=$_POST['correo'];
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];
$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");
	
	$buscarUsuario = "SELECT * FROM usuario WHERE Correo='$correo' AND Respuesta = '$respuesta'";
	
  
	$result = $mysqli->query($buscarUsuario); 
	$count = $result->num_rows; 
	if($count>0){
		$_SESSION['correoA']=$correo;
	?>
	<script>location.href="modificarPass.php"</script> 
			<?php
	}else{
			?>

	<script>alert("Respuesta incorrecta"); location.href="recuperarPass.php"</script> 
			<?php	
			}
	mysqli_close($mysqli);
?>