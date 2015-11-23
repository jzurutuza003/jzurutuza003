<?php
$Pregunta=$_POST['Pregunta'];
//$usu=mysql_connect("mysql.hostinger.es","u878461769_mysql","abcd1234");
	
	
//mysql_select_db("u878461769_mysql",$usu);
//$sql="SELECT * FROM Quiz WHERE Pregunta='$Pregunta'";
//$result = mysql_query($sql); 



//}$row = mysql_fetch_array($result); 
  
 //echo json_encode(array("Correo"=> $row['Correo'],"Pregunta"=>$row['Pregunta'],"Respuesta"=>$row['Respuesta'],"Tematica"=>$row['Tematica'],"Valoracion"=>$row['Valoracion']));
	
//mysql_close();

if($Pregunta=='a'){
echo json_encode(array("Correo"=>'a@a.com',"Pregunta"=>$Pregunta,"Respuesta"=>'zuuuuuuuuu',"Tematica"=>'zuuuuuuuuu',"Valoracion"=>'zuuuuuuuuu'));
}
if($Pregunta=='b'){
echo json_encode(array("Correo"=>'b@b.com',"Pregunta"=>$Pregunta,"Respuesta"=>'zuuuuuuuuu',"Tematica"=>'zuuuuuuuuu',"Valoracion"=>'zuuuuuuuuu'));
}
if($Pregunta=='aaa'){
echo json_encode(array("Correo"=>'aaa@aaa.com',"Pregunta"=>$Pregunta,"Respuesta"=>'zuuuuuuuuu',"Tematica"=>'zuuuuuuuuu',"Valoracion"=>'zuuuuuuuuu'));
}
?>