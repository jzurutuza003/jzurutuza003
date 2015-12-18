<?php 

$usuario=$_POST['Nombre'];
$Password=$_POST['Password'];
$correo=$_POST['Correo'];
$Telefono=$_POST['Telefono'];
$Especialidad=$_POST['Especialidad'];
$Especialidad_alternativa=$_POST['Especialidad_alternativa'];
$Comentario=$_POST['Comentario'];
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];
$Cifrado = sha1(md5($Password));
$conf=$_POST['Confirm password'];

$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");

$buscarUsuario = "SELECT * FROM usuario WHERE Correo = '$correo'  "; 
$result = $mysqli->query($buscarUsuario); 

$count = $result->num_rows;
 
$img=base64_encode(file_get_contents($_FILES["archivo"]["tmp_name"]));

if (!filter_var($correo, FILTER_VALIDATE_EMAIL) === false){
  echo("<strong>$correo válido</strong>");
if($password==conf){

if ($count == 1){ 
	echo '<script language="javascript">alert("Correo ya existente");</script>';
}else{
	$SQL1=" INSERT INTO usuario VALUES('$usuario', '$Cifrado','$correo','$Telefono','$Especialidad','$Especialidad_alternativa','$Comentario','$img','0','$pregunta','$respuesta')";
	$mysqli->query($SQL1); 

	echo "<p><strong>Ha sido registrado correctamente</strong</p>";
 }
}
}else{
  echo("<strong>Correo no valido</strong>");
  echo("<strong>No ha sido registrado</strong>");
}
 

$result->free();
$mysqli->close();
?>