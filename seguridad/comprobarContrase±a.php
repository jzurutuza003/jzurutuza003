<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//creamos el objeto de tipo soap_server
$ns="http://localhost/nusoap-0.9.5/samples";
$server = new soap_server;
$server->configureWSDL('comprobarContraseña',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('comprobarContraseña',
array('x'=>'xsd:string'),
array('z'=>'xsd:string'),
$ns);
function comprobarContraseña($x){
	$fichero_texto = fopen ("toppasswords.txt", "r");
	while(!feof($fichero_texto))
{
 $var=fgets($fichero_texto);
 if($var==$x){
	 return 'INVALIDA';
 }
}
close($fichero_texto);
return 'VALIDA';

}
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? 
$HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA)

?>