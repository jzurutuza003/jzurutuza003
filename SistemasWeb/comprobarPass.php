<?php
require_once('nusoap.php');
require_once('class.wsdlcache.php');

//creamos el objeto de tipo soap_server
$ns="http://jz.esy.es/ServiciosWeb/comprobarPass.php?wsdl";
$server = new soap_server;
$server->configureWSDL('comprobarPass',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('comprobarPass',

array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

function comprobarPass($x){
	$archivo = fopen("toppasswords.txt", "r");
    while(!feof($archivo)){
        $traer = fgets($archivo);
		if(strcmp(trim($traer),$x)==0){
			return 'INVALIDA';
		}
	}
	return 'VALIDA';
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? 
$HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA)
?>