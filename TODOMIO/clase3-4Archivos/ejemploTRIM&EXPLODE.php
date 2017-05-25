<?php
	TraerTodosLosProductos();

	function TraerTodosLosProductos()
	{

		$ListaDeProductosLeidos = array();

		//leo todos los productos del archivo
		$archivo=fopen("cosas.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			
			//TOMA EXACTAMENTE LO QUE SE PASA "-"(es sin espacio y lo lee asi)
			$productos = explode("-", $archAux);

			//Elimina espacion al principio y final de la cadena
			$productos[0] = trim($productos[0]);
			
			echo $productos[0].$productos[1]."<br/>";
		}
		fclose($archivo);
		
		return $ListaDeProductosLeidos;
		
	}

?>