<?php 

$usuario=$_POST['Nombre'];
$Password=$_POST['Password'];
$correo=$_POST['Correo'];
$Telefono=$_POST['Telefono'];
$Especialidad=$_POST['Especialidad'];
$Especialidad_alternativa=$_POST['Especialidad_alternativa'];
$Comentario=$_POST['Comentario'];
$img=file_get_contents($_FILES['archivo']['tmp_name']);




$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");

mysql_select_db("u878461769_mysql",$usu);
 $buscarUsuario = "SELECT * FROM usuario WHERE Correo = '$correo'  "; 
 $result = mysql_query($buscarUsuario); 
 $count = mysql_num_rows($result); 
 
 
if (!filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
  echo("$correo válido.");
} else {
  echo("$correo no válido.");
}
 
 if ($count == 1){ 
	echo '<script language="javascript">alert("Correo ya existente");</script>';
 }else{
	$SQL1=" INSERT INTO usuario VALUES('$usuario', '$Password','$correo','$Telefono','$Especialidad','$Especialidad_alternativa','$Comentario','$img')";
	if (!mysql_query($SQL1))
		{
		die('Error: ' . mysql_error());
		}
	echo "<p>. Esta dentrooo! . </p>";
	mysql_close($usu);
 }
?>