<?php
session_start();
if(isset($_SESSION['correo'])){
	$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");

	$result = $mysqli->query( "SELECT * FROM Quiz"); 
	$count = $result->num_rows;
	
	echo '<p id="titulo"><strong>Preguntas:</strong></p>';
	
	echo "<div id='visualizar'>";
	while( $row = $result->fetch_object() ) {
		echo '<p id="P">'.$row->Pregunta.'</p>';	
	}
	echo '</div>';
	
	$result->free();
	$mysqli->close();


?>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title> Visualizar Preguntas Pregunta </title>
			<link rel="STYLESHEET" type="text/css" href="estilos/style.css">
		</head>
		<body>
		</body>
	</html>
<?php 
}else{
header("Location:layout.php");
}
?>