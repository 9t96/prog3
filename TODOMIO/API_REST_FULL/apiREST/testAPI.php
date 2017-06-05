<?php

require_once "vendor/autoload.php";

$app = new \Slim\Slim();

$app->response->headers->set("Content-type", "application/json");

//Ejemplo sin parametros.
//$app->get('/saludar', function(){echo "hola mundo";});

//Ejemplo con parametros.
//$app->get('/saludar/:nombre', function($nombre){echo "hola" .$nombre. "mundo";});

//Con dos parametros (Por cada barra un parametro, la invocacion es igual a la definicion.).
//$app->get('/saludar/:nombre/:apellido', function($nombre,$apellido){echo "hola " .$nombre. " ". $apellido;});

//Parametros opcionales (Los param opcionales deben estar dentro de parentesis en la deficinicion pero no en la llamada).
/*$app->get('/saludar/:nombre(/:apellido)', 
function($nombre,$apellido=NULL){

    if($apellido != NULL)
        echo "hola" .$nombre. " ". $apellido;
    else
        echo "hola".$nombre;
}
);*/

//Retorno un JSON.
/*$app->get('/test', 
function(){
    
    $miclass = new stdClass();
    $miclass->Mensaje = "Hola Mundo".$_GET["l"];

    echo json_encode($miclass);
}
);
*/


//Utilizando metodo posta y recibiendo datos.
/*$app->POST('/test', function() use($app) {

    $miarray = array('Mensaje' => "POST", 'numerofromPOST' => $_POST["numero"], 'datafromPOST' => $_POST["data"]);
    // Indicamos el tipo de contenido y condificación que devolvemos desde el framework Slim.
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($miarray));
});
*/

//Utilizando PUT con Parametros.
/*$app->PUT('/test', function() use($app) {

    $nmbr  = $app->request->post("numero");
    $data  = $app->request->post("data");

    $miarray = array('Mensaje' => "PUT", 'numerofromPOST' => $nmbr, 'datafromPOST' => $data);
    // Indicamos el tipo de contenido y condificación que devolvemos desde el framework Slim.
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($miarray));
});*/

$app->DELETE('/test', function() use($app) {

    $nmbr  = $app->request->post("numero");
    $data  = $app->request->post("data");

    $miarray = array('Mensaje' => "DELETE", 'numerofromPOST' => $nmbr, 'datafromPOST' => $data);
    // Indicamos el tipo de contenido y condificación que devolvemos desde el framework Slim.
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($miarray));
});


$app->run();

?>