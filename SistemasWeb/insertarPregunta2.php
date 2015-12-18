<?php
session_start();
sleep(2);
try{
	$Correo=$_SESSION['correo'];
	$Pregunta=$_POST['Pregunta'];
	$Complejidad=$_POST['Valoracion'];
	$Respuesta=$_POST['Respuesta'];
	$Tematica=$_POST['Tematica'];
	
	$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");
	
	$buscarPregunta = "SELECT * FROM Quiz WHERE  Pregunta='$Pregunta' "; 
	$result = $mysqli->query($buscarPregunta); 
	$count = $result->num_rows;
	
	if($count>0){
		echo 'Pregunta existente en la base de datos';
	}else{
if($Complejidad > 0 $$ $Complejidad < 6){
		$tabla="SELECT * FROM Quiz";
		$tabla2 = $mysqli->query($tabla); 

		$Numero =  $tabla2->num_rows;
		$Numero=$Numero +1;
		
		$SQL1="INSERT INTO Quiz VALUES('$Numero', '$Correo','$Pregunta','$Respuesta','$Complejidad','$Tematica')";
		$mysqli->query($SQL1);

	

		
		
	$xml = simplexml_load_file('preguntas.xml');
	$assessmentItem=$xml->addChild('assessmentItem');
	$itemBody=$assessmentItem->addChild('itemBody');
	$p=$itemBody->addChild('p',$_POST['Pregunta']);
		
	$correctResponse=$assessmentItem->addChild('correctResponse'); 
	$value=$correctResponse->addChild('value',$_POST['Respuesta']); 
	$assessmentItem->addAttribute('complexity',$_POST['Valoracion']);
	$assessmentItem->addAttribute('subject',$_POST['Tematica']);
		
	if (!$xml->asXML('preguntas.xml'))
	{
		throw new Exception($error);
	}
	echo "Pregunta introducida correctamente";
	}
	$result->free();
	$mysqli->close();
}
}catch(Exception $error){
	echo "Error, pregunta no introducida";
}
?>