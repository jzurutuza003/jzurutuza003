<?php
$correo=$_GET['Correo'];
$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");
	
	$buscarUsuario = "SELECT * FROM usuario WHERE Correo = '$correo'";
	
  
	$result = $mysqli->query($buscarUsuario); 
$num=$result->num_rows;
if($num==0){
 echo json_encode(array("Pregunta"=> ""));
}else{
	foreach($result as $r){
	 echo json_encode(array("Pregunta"=> $r['Pregunta']));
	}
}
	mysqli_close($mysqli);
?>