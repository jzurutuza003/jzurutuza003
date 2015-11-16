<?php
session_start();
$Correo=$_SESSION['correo'];
	$Pregunta=$_POST['Pregunta'];
	$Complejidad=$_POST['Valoracion'];
	$Respuesta=$_POST['Respuesta'];
	$Tematica=$_POST['Tematica'];
	
	$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");
	if(!$usu){
		throw new Exception($error);
	}
	
	if(!mysql_select_db("u878461769_mysql",$usu)){
		throw new Exception($error);
	}
	$buscarPregunta = "SELECT * FROM Quiz WHERE  Pregunta=$Pregunta "; 
	$result = mysql_query($buscarPregunta); 
	$count = mysql_num_rows($result); 
	if($count>0){
		echo '<script type="text/javascript"> 
	alert("Pregunta existente en la base de datos");
	</script>';
	}else{
		$tabla="SELECT * FROM Quiz";
		$tabla2=mysql_query($tabla);
		if(!$tabla2){throw new Exception($error);}
		$Numero = mysql_num_rows($tabla2);
		$Numero=$Numero +1;
		$SQL1=" INSERT INTO Quiz VALUES('$Numero', '$Correo','$Pregunta','$Respuesta','$Complejidad','$Tematica')";
		if (!mysql_query($SQL1))
		{
		throw new Exception($error);
		}
		}
		$_SESSION["logueado"]=0;
		mysql_close($usu);
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
		echo '<script type="text/javascript"> 
	alert("Se ha introducido la pregunta en la base de datos");
	</script>';
	mysql_close($usu);
	?>