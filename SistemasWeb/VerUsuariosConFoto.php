<?php 
session_start();
if($_SESSION['tipo']==2){
$mysqli = new mysqli("mysql.hostinger.es","u878461769_mysql","abcd1234", "u878461769_mysql");

$buscarUsuario = "SELECT * FROM usuario"; 
$result = $mysqli->query($buscarUsuario); 

	
echo '<TABLE BORDER=1 WIDTH=300>
			<TR>
				<TD WIDTH=100>Nombre</TD>
				<TD WIDTH=100>Correo</TD>
				<TD WIDTH=100>Telefono</TD>
				<TD WIDTH=100>Especialidad</TD>
				<TD WIDTH=100>Especialidad Alternativa</TD>
				<TD WIDTH=100>Comentario</TD>
				<TD WIDTH=100>Imagen</TD>
			</TR>';
			
	foreach($result as $row) {
		echo '<TR>
				<TD WIDTH=100>'.$row["Nombre"].'</TD>
				<TD WIDTH=100>'.$row["Correo"].'</TD>
				<TD WIDTH=100>'.$row["Telefono"].'</TD>
				<TD WIDTH=100>'.$row["Especialidad"].'</TD>
				<TD WIDTH=100>'.$row["Otro"].'</TD>
				<TD WIDTH=100>'.$row["Tecnologias y herramientas"].'</TD>
				<TD WIDTH=100>';
				
				echo'<img src="data:image/;base64,'.$row["Imagen"].'"width="200px" height="150px">';
				echo '</TD></TR>';
	}
echo '</TABLE>';			

$result->free();
$mysqli->close(); 
}else{
header("Location:layout.php");
}
?>