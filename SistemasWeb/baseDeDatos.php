<?php
session_start();

$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");
$usuarios = $mysqli->query( "SELECT * FROM Quiz WHERE Correo = '$_SESSION[correo]'");
$numero = $mysqli->query( "SELECT * FROM Quiz");
echo '<table border=1> <tr> <th> PREGUNTAS </th><th style="width:20%;">'.$numero->num_rows.'</th></tr>';
	while( $row = $usuarios->fetch_object())
	{
		echo '<tr><td>' .$row->Pregunta. '</td></tr>';
	}
echo '</table>';

$usuarios->free();
$mysqli->close();
?>