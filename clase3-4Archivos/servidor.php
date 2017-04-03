<?php 
require_once ('/Clases/cosa.php');

/*
var_dump($_POST,$_GET,$_REQUEST);
*/

if(isset($_POST["leer"]))
{
    $arc = fopen("textos.txt","r");

    $datos = fread($arc,filesize("textos.txt")); 

    if($datos === false)
    {
        echo "Error al leer";
    }
    else
    {
        echo $datos;
    }

    fclose($arc);
}
else
{
   $cosa = new cosa($_POST["txtName"],"name");
   $cosa->Agregar();
}


/* //1param= path //2param = modod de apertura.
$arc = fopen("textos.txt","a");

         //Archivo abierto //Metodo= get,post o req   
if(fwrite($arc,$_POST["txtName"]."\r\n"))
{
    echo "Escribio exitosamente.";
}
else
{

    echo "No logro escribir.";
}

fclose($arc);*/

?>