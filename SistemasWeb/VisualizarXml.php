<?php
session_start();
if(isset($_SESSION['correo'])){
$xslDoc = new DOMDocument(); 
$xslDoc->load("xsl.xsl");
$xmlDoc = new DOMDocument();
$xmlDoc->load("preguntas.xml");

$proc = new XSLTProcessor();
$proc->importStylesheet($xslDoc); 
echo $proc->transformToXML($xmlDoc);
}else{
header("Location:layout.php");
}
?>