<?php
require_once("../Clases/container.php");

if (isset($_GET["numero"])) {

	$numero = $_GET["numero"];

	if (container::EliminarBD($numero)) {
		require_once("mostrarTabla.php");
	}
	else
	{
		echo "EROR AL INTENTAR ELIMINAR";
		die();
	}
}
	














?>