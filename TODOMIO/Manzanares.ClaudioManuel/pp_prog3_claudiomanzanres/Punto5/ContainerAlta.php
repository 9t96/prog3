<?php
require_once("../Clases/container.php");

if (isset($_FILES["archivo"])) 
{
	$destinoFoto = "Fotos/".$_FILES["archivo"]["name"];
	$esFoto = getimagesize($_FILES["archivo"]["tmp_name"]);

	if ($esFoto !== FALSE) 
	{
		if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destinoFoto))
		{
			$newContainer = new Container($_POST["numero"],$_POST["pais"],$_POST["descripcion"],basename($destinoFoto));

			$newContainer->GuardarEnBD();
			
		}
		else
		{
			echo "Erro al mover archivo.";
		}

	}
	else
	{
		echo "error";
	}


}


?>