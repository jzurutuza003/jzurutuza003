<?php
session_start();
if($_SESSION['Tipo']=='1'){
		
	$Correo=$_POST['Correo'];
	$Pregunta=$_POST['Pregunta'];
	$Complejidad=$_POST['Valoracion'];
	$Respuesta=$_POST['Respuesta'];
	$Tematica=$_POST['Tematica'];
	
$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");
	
	
	mysql_select_db("u878461769_mysql",$usu);
	
	$result = mysql_query("SELECT * FROM Quiz WHERE  Pregunta='$Pregunta' "); 
	$count = mysql_num_rows($result); 
	if($count>0){
		echo '<script type="text/javascript"> 
	alert("Pregunta existente en la base de datos");
	</script>';
	}else{
		
		

		
		$SQL1=" UPDATE Quiz SET Pregunta='$Pregunta' AND Respuesta='$Respuesta' AND Complejidad='$Complejidad' AND Tematica='$Tematica' WHERE Correo='$Correo'";
		mysql_query($SQL1);
		}
		
		mysql_close($usu);
		
		
	header("Location:RevisarPreguntas.php");
}
?>