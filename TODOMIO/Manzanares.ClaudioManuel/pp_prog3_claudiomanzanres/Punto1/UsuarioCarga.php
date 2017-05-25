<?php
require_once("../Clases/usuarios.php");

if (isset($_POST["btnSubmit"])) 
{
	$newUser = new usuarios($_POST["nombre"],$_POST["clave"],$_POST["edad"],$_POST["email"]);

	$newUser->GuardarEnArchivo();
}



?>