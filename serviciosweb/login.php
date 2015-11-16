<?php 
if (isset($_POST['correo']))
{
	$Password=$_POST['pass'];
	$correo=$_POST['correo'];
	$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");

mysql_select_db("u878461769_mysql",$usu);
 $buscarUsuario = "SELECT * FROM usuario WHERE Correo = '$correo' AND Password='$Password' "; 
 $result = mysql_query($buscarUsuario); 
 $count = mysql_num_rows($result); 
 if($count==0){
	echo '<script type="text/javascript"> 
	alert("Usuario/Password incorrectos");
	</script>';
	
 }else{
	 
	   session_start();
        $_SESSION['correo'] = $correo;
		$_SESSION['logueado']=1;
		header("Location:menu.html");
 }
 mysql_close($usu);
}
 ?>
<html>
<head>
<title> Resgistrar </title>
<link rel="STYLESHEET" type="text/css"
href="estilo.css">
</head>
<body>
	<span id="home"class="right"><a href="layout.html"> <img align=right src="http://www.veryicon.com/icon/ico/Object/Heartquake%20Prevention/Casa.ico" height="50px"/></a></span>
<form action="login.php" method="post" id='formulario'>
<div id='login'> 
	<p id='titulo'> Login </p>
	<p id='p1'>Correo:
	<input type='text' id='correo' name='correo'></p>
	<p id='p2'>Password: <input type='password' id='Pass'name='pass'></p>
  
<p id='p3'><input type='submit' id='boton' value='Registrarse'></p>
</div>
</form>

</body>
</html>

