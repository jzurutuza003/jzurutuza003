<?php 
echo '<script type="javascript"> alert("Correo ya existente");</script>' ;
$usuario=$_POST['Nombre'];
$Password=$_POST['Password'];
$correo=$_POST['Correo'];
$Telefono=$_POST['Telefono'];
$Especialidad=$_POST['Especialidad'];
$Especialidad_alternativa=$_POST['Especialidad_alternativa'];
$Comentario=$_POST['Comentario'];
$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");

mysql_select_db("u878461769_mysql",$usu);
 $buscarUsuario = "SELECT * FROM usuario WHERE Correo = '$correo'  "; 
 $result = mysql_query($buscarUsuario); 
 $count = mysql_num_rows($result); 
 if ($count == 1){ 
	echo '<script language="javascript">alert("Correo ya existente");</script>';
 }else{
	$SQL1=" INSERT INTO usuario VALUES('$usuario', '$Password','$correo','$Telefono','$Especialidad','$Especialidad_alternativa','$Comentario')";
	if (!mysql_query($SQL1))
		{
		die('Error: ' . mysql_error());
		}
	echo "<p>. Esta dentrooo! . </p>";
	mysql_close($usu);
 }
?>

