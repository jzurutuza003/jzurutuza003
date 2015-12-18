<?php
$Pregunta=$_GET['Pregunta'];
//$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");
$mysqli = new mysqli("mysql.hostinger.es", "u878461769_mysql", "abcd1234", "u878461769_mysql");
	

$sql="SELECT * FROM Quiz WHERE Pregunta='$Pregunta'";
$resultado = $mysqli->query($sql); 



$sql="SELECT * FROM Quiz WHERE Pregunta='$Pregunta'";
$resultado = $mysqli->query($sql); 



foreach($resultado as $row){
  
 echo json_encode(array("Correo"=> $row['Correo'],"Pregunta"=>$row['Pregunta'],"Respuesta"=>$row['Respuesta'],"Tematica"=>$row['Tematica'],"Valoracion"=>$row['Complejidad']));
}
mysqli_close($mysqli);
?>