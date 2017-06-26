<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require_once './clases/Bicicleta.php';
require_once 'AccesoDatos.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers-Allow-Origin: X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,UPDATE,OPTIONS");
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\app(["settings" => $config]);


$app->POST('/AltadeBiciletas', function(Request $request, Response $response)  {

    $bicientrante = $request->getParsedBody();

   	if (Bicicleta::AltaBicicleta($bicientrante['id'],$bicientrante['color'],$bicientrante['marca'],$bicientrante['rodado'])) {

   		echo "IngresoLaBici";
    	
    }
    else
    {
    	echo "error al ingresar bici";
    }



});

$app->get('/ListarBicicletas', function(Request $request, Response $response)  {

    $response->getBody()->Write(json_encode(Bicicleta::ListarBicicletas()));

});

$app->get('/ListarPorColor', function(Request $request, Response $response)  {

    $color = $_GET['color'];


    $response->getBody()->Write(json_encode(Bicicleta::ListarPorColor($color)));
});

$app->get('/TraerPorId', function(Request $request, Response $response)  {

    
    $id = $_GET['id'];
    
    $bicicletas = Bicicleta::ListarPorId($id);

    if ($bicicletas !== NULL) {
    	$response->getBody()->Write(json_encode($bicicletas));
    }
    else
    {
    	echo "error";
    }

});

$app->delete('/BorrarBici', function(Request $request, Response $response)  {

    $id  = $_GET['id'];

    if (Bicicleta::BorrarPorId($id)) {
    	echo "borro";
    }
    else
    {
    	echo "no borro";
    }


});

$app->POST('/AltadeVentaBiciletas', function(Request $request, Response $response)  {

    $biciVendida = $request->getParsedBody();

    if (Bicicleta::VentaBici($biciVendida['idBicicleta'],$biciVendida['nombreCliente'],$biciVendida['precio'],$request)) {
    	echo "Guardo bien bici";
    }
    else
    {
    	echo "erro al guardar bici";
    }




});

$app->run();



