<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/vendor/autoload.php';
require '/clases/AccesoDatos.php';
require '/clases/cd.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
/*

¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

$app->get('/', function (Request $request, Response $response) {
  
    $response->getBody()->write("Hola Slim con .htaccess");

    return $response;
});

$app->get('/get/cd', function (Request $request, Response $response) {
  
    $datos = cd::TraerTodos();

    $response->getBody()->write(json_encode($datos));

});

$app->get('/get/cd/{id}', function (Request $request, Response $response) {
    
    $datos = cd::TraerPorId($request->getAttribute('id'));

    $response->getBody()->write(json_encode($datos));

});

$app->DELETE('/DELETE/cd/{id}', function (Request $request, Response $response) {
    
    $datos = cd::EliminarPorId($request->getAttribute('id'));

    if($datos == TRUE)
     $response->getBody()->write("Elimino NICE");
    else
        $response->getBody()->write("Error");

});

$app->PUT('/PUT/cd', function (Request $request, Response $response) {
    
    $info = $request->getParsedBody();
    
    $datos = cd::UpdateCd($info["id"],$info["titel"],$info["interpret"]);

    if($datos == TRUE)
        $response->getBody()->write("updateo NICE");
    else
        $response->getBody()->write("Error updateando");

});

$app->POST('/POST/cd', function (Request $request, Response $response) {
    
    $info = $request->getParsedBody();

    $datos = cd::AgregarCd($info,$request);

    if($datos == TRUE)
        $response->getBody()->write("Escribio NICE");
    else
        $response->getBody()->write("Error agregando");

});
//IMPLEMENTAR
//GET -> TRAER TODOS
//GET -> TRAER UNO
//POST -> INSERTAR (CON FOTO)
//PUT -> MODIFICAR
//DELETE -> ELIMINAR


$app->run();