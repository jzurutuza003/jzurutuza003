<?php
session_start();
$correo=$_SESSION['correoA'];
$pass=$_POST['pass'];
$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");
	
	$buscarUsuario = "SELECT * FROM usuario WHERE Correo='$correo'";
	
  
	$result = $mysqli->query($buscarUsuario); 
	$count = $result->num_rows; 
	if($count>0){
                $Cifrado = sha1(md5($pass));
		$result = $mysqli->query("UPDATE usuario SET Password='$Cifrado' WHERE Correo='$correo'"); 
	?>
	<script>alert("Contraseña modificada"); location.href="login.php"</script> 
			<?php
	}else{
			?>
	<script>alert("No se ha podido modificar"); location.href="modificarPass.php"</script> 
			<?php	
			}
	mysqli_close($mysqli);
?>