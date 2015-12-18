<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://jz.esy.es/ServiciosWeb/comprobarPass.php?wsdl', true);

sleep(2);

$param = array('x' =>$_POST['pass']);
$result = $soapclient->call('comprobarPass',$param);
echo $result;
?>