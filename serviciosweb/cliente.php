<?php

require_once('nusoap.php');
require_once('class.wsdlcache.php');

$soapclient = new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl', true);

sleep(2);
 
	$param = array('x' =>$_POST['Correo']);
$result = $soapclient->call('comprobar',$param);
	echo $result;
	

?>