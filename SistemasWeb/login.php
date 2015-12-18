<?php 
session_start();
if (isset($_POST['correo']))
{
   if(!isset($_SESSION['Intentos'])){
        $_SESSION['Intentos']=1;
   }else{
        $_SESSION['Intentos']=$_SESSION['Intentos']+1;

   }
   if($_SESSION['Intentos']>=3){

        ?>
			<script>alert("Has superado el numero de intentos(3)"); top.location.href="layout.php"</script> 
		<?php
   }else{
	$Password=sha1(md5($_POST['pass']));
	$correo=$_POST['correo'];

	$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");
	
	$buscarUsuario = "SELECT * FROM usuario WHERE Correo = '$correo' AND Password='$Password' AND Tipo='0'"; 
	$buscarProfesor = "SELECT * FROM usuario WHERE Correo = '$correo' AND Password='$Password' AND Tipo='1'"; 
  
	$result = $mysqli->query( $buscarUsuario); 
	$result2 = $mysqli->query($buscarProfesor);
 
	$count = $result->num_rows; 
	$count2 = $result2->num_rows;

	echo 'Comprobando...'; 
	
	if($count2==0){
		if($count==0){
			
		}else{  
			unset($_SESSION['Intentos']);
			$_SESSION['correo'] = $correo;
			$_SESSION['logueado']=1;
			$_SESSION['tipo']=0;
			?>
				<script>top.location.href="layoutUsuario.php"</script> 
			<?php
		}
	}else{
		unset($_SESSION['Intentos']);
        $_SESSION['correo'] = $correo;
		$_SESSION['logueado']=1;
		$_SESSION['tipo']=2;
		?>
			<script> top.location.href="layoutProfesor.php"</script> 
		<?php
	}
?>
			<script>alert("Correo/contrase�a incorrecta"); location.href="login.php"</script> 
		<?php
	$result->free();
	$result2->free();
	$mysqli->close();
}
}
?>

<html>
	<head>
		<link rel="STYLESHEET" type="text/css" href="estilos/style.css">
	</head>
	<body>
		<form action="login.php" method="post" id='formulario'>
			<div id='login'> 
				<p>Correo:<input type='text' id='correo' name='correo'></p><br>
				<p>Password: <input type='password' id='Pass'name='pass'></p><br>
				<a href="recuperarPass.php">¿Se te ha olvidado la contraseña?</a>
				<p><input type='submit' id='boton' value='Logearse'></p>
			</div>
		</form>
	</body>
</html>

