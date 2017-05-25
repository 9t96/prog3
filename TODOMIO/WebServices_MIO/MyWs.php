<?php


	require_once('/lib/nusoap.php'); 
	

	$server = new nusoap_server(); 


	$server->configureWSDL('Mi Web Service #1', 'urn:MyWs'); 

	$server->wsdl->addComplexType(
								'Resta',
								'complexType',
								'struct',
								'all',
								'',
								array('Numero1' => array('num' => 'value', 'type' => '	xsd:int'),
									  'Numero2' => array('num' => 'value', 'type' => 'xsd:int'),
									 )
								);

	$server->register('Restar',                	
				array('Resta' => 'tns:Resta'),  
				array('return' => 'xsd:float'),   
				'urn:testWSDL',                		
				'urn:testWSDL#Restar',             
				'rpc',                        		
				'encoded',                    		
				'Restar dos numero'    			
					);


	$server->register('Sumar',                								// METODO
				array('numero1' => 'xsd:int','numero2' => 'xsd:int'),  		// PARAMETROS D ENTRADA
				array('return' => 'xsd:int'),    							// PARAMETROS DE SALIDA
				'urn:testWS',                								// NAMESPACE
				'urn:MyWs#Sumar',               							// ACCION SOAP
				'rpc',                        								// ESTILO
				'encoded',                    								// CODIFICADO
				'Suma dos numeros'    										// DOCUMENTACION
				);


	$server->register('Multiplicar',                								// METODO
				array('numero1' => 'xsd:int','numero2' => 'xsd:int'),  		// PARAMETROS D ENTRADA
				array('return' => 'xsd:int'),    							// PARAMETROS DE SALIDA
				'urn:testWS',                								// NAMESPACE
				'urn:MyWs#Multiplicar',               							// ACCION SOAP
				'rpc',                        								// ESTILO
				'encoded',                    								// CODIFICADO
				'Multiplica dos numeros'    										// DOCUMENTACION
				);


//5.- DEFINIMOS EL METODO COMO UNA FUNCION PHP
	function Sumar($numero1,$numero2) {

		return $numero1 + $numero2;
	}

	function Multiplicar($numero1,$numero2) {

		return $numero1 * $numero2;
	}

	function Restar($resta) {

		return $resta["Numero1"] - $resta["Numero2"];
	}

//6.- USAMOS EL PEDIDO PARA INVOCAR EL SERVICIO
	$HTTP_RAW_POST_DATA = file_get_contents("php://input");
	//http://php.net/manual/es/wrappers.php.php#wrappers.php.input
	
	$server->service($HTTP_RAW_POST_DATA);





?>