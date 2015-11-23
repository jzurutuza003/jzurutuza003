<?php 
  session_start();
if (isset($_POST['correo']))
{
	$Password=$_POST['pass'];
	$correo=$_POST['correo'];

	$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");

mysql_select_db("u878461769_mysql",$usu);
 $buscarUsuario = "SELECT * FROM usuario WHERE Correo = '$correo' AND Password='$Password' AND Tipo='0'"; 
 $buscarProfesor = "SELECT * FROM usuario WHERE Correo = '$correo' AND Password='$Password' AND Tipo='1'"; 
 $result = mysql_query($buscarUsuario); 
 $result2 = mysql_query($buscarProfesor); 
 $count = mysql_num_rows($result); 
 $count2 = mysql_num_rows($result2); 
echo $count2;
 if($count2==0){
	if($count==0){}else{  
		$_SESSION['correo'] = $correo;
		$_SESSION['tipo']=0;
		header("Location:menu.php");
	}
	
 }else{
        $_SESSION['correo'] = $correo;
		$_SESSION['tipo']=1;
		header("Location:menu.php");
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

