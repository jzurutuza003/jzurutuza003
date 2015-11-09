<?php 
echo '<script type="javascript"> alert("Correo ya existente");</script>' ;
$usuario=$_POST['Nombre'];
$Password=$_POST['Password'];
$correo=$_POST['Correo'];
$Telefono=$_POST['Telefono'];
$Especialidad=$_POST['Especialidad'];
$Especialidad_alternativa=$_POST['Especialidad_alternativa'];
$Comentario=$_POST['Comentario'];
$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");

mysql_select_db("u878461769_mysql",$usu);
 $buscarUsuario = "SELECT * FROM usuario"; 
 $result = mysql_query($buscarUsuario); 
	
	echo '<TABLE BORDER=1 WIDTH=300>
			<TR>
			<TD WIDTH=100>
			Nombre
			</TD>

			<TD WIDTH=100>
			Password
			</TD>

			<TD WIDTH=100>
			Correo
			</TD>
			<TD WIDTH=100>
			Telefono
			</TD>
			<TD WIDTH=100>
			Especialidad
			</TD>
			<TD WIDTH=100>
			Especialidad_alternativa
			</TD>
			<TD WIDTH=100>
			Comentario
			</TD>
			<TD WIDTH=100>
			Imagen
			</TD>
			</TR>';
			while( $row = mysql_fetch_array( $result ) ) {
				echo '<TR>
				<TD WIDTH=100>'
					.$row['Nombre'].
			'</TD>
				
			<TD WIDTH=100>'
			.$row['Password'].
			'</TD>

			<TD WIDTH=100>'
			.$row['Correo'].
			'</TD>
			<TD WIDTH=100>'
			.$row['Telefono'].
			'</TD>
			<TD WIDTH=100>'
			.$row['Especialidad'].
			'</TD>
			<TD WIDTH=100>'
			.$row['Otro'].
			'</TD>
			<TD WIDTH=100>'
			.$row['Tecnologias y herramientas'].
			'</TD><TD WIDTH=100>';
			
			echo'<img src="data:image/;base64,'.base64_encode($row['Imagen']).'">';
			echo '</TD></TR>';
			
			}
			
			echo '</TABLE>';
			
	mysql_close($usu);
 
?>