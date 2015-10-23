<?php
$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");

	mysql_select_db("u878461769_mysql",$usu);
	$buscarPregunta = "SELECT * FROM Quiz"; 
	$result = mysql_query($buscarPregunta); 
	$count = mysql_num_rows($result); 
	
	echo '<p id="titulo">Preguntas:<span class="right"><a href="layout.html"> <img align=right src="http://www.veryicon.com/icon/ico/Object/Heartquake%20Prevention/Casa.ico" height="50px"/></a></span></p>';
	
	echo "<div id='visualizar'>";
	while( $row = mysql_fetch_array( $result ) ) {
		echo '<p id="P">'.$row['Pregunta'].'</p>';
		
	}
	echo '</div>';
	mysql_close($usu);
	?>
	<html>
		<head>
		<title> Visualizar Preguntas Pregunta </title>
		<link rel="STYLESHEET" type="text/css"
		href="estilo_v.css">
		</head>
		<body>
		</body>
		</html>