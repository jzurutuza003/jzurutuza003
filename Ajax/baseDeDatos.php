<?php
session_start();
$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");

mysql_select_db("u878461769_mysql",$usu);
$Correo=$_SESSION['correo'];

$consulta="SELECT * FROM Quiz WHERE Correo='$Correo'";
 $result = mysql_query($consulta);
echo '<TABLE BORDER=1 WIDTH=300>
			<TR>
			<TD WIDTH=100>
			Preguntas
			</TD>
			</TR>';
			while( $row = mysql_fetch_array( $result ) ) {
				echo '<TR>
				<TD WIDTH=100>'
					.$row['Pregunta'].
			'</TD>
				
			</TR>';
			
			
 }
echo '</TABLE>';
 mysql_close($usu);
?>