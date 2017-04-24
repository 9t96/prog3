<?php

	$conexion = mysqli_connect("localhost","root","","utn");

	if($conexion)
	{
		//1. Obtener los detalles completos de todos los productos, ordenados alfabéticamente.

		$query = mysqli_query($conexion,"SELECT * FROM productos ORDER by pNombre ASC");

		$fetched = mysqli_fetch_all($query);

		echo "<table class='table' border='1'>
	    <thead>
	        <tr>
	        <td>pNumero</td>
	        <td>pNombre</td>
	        <td>Precio</td>
	        <td>Tamaño</td>
	        <tr/>
	    </thead>";
	                    //Devuelve cantidad de filas.
	    for ($i=0; $i < mysqli_num_rows($query); $i++) { 
	        echo "<tr>
	        <td>".$fetched[$i][0]."</td>
	        <td>".$fetched[$i][1]."</td>
	        <td>".$fetched[$i][2]."</td>
	        <td>".$fetched[$i][3]."</td>
	        <tr/>";
	    }
       
    	echo "</table>";
    	mysqli_free_result($query);
    	/******************************************************************/
    	//2. Obtener los detalles completos de todos los proveedores de ‘Quilmes’.

    	$query = mysqli_query($conexion,"SELECT * FROM proveedores WHERE Localidad LIKE 'Quilmes'");

    	$fetched = mysqli_fetch_all($query);

    	echo $fetched[0][0].$fetched[0][1].$fetched[0][2].$fetched[0][3]."<br/>"."<br/>";

    	mysqli_free_result($query);
    	/*******************************************************************/
    	//3. Obtener todos los envíos en los cuales la cantidad este entre 200 y 300 inclusive.

    	$query = mysqli_query($conexion,"SELECT * FROM `envios` WHERE Cantidad BETWEEN 200 AND 300");

    	$fetched =mysqli_fetch_all($query);

    	echo "<table class='table' border='1'>
	    <thead>
	        <tr>
	        <td>Numero</td>
	        <td>pNumero</td>
	        <td>Cantidad</td>
	        <tr/>
	    </thead>";
	                    //Devuelve cantidad de filas.
	    for ($i=0; $i < mysqli_num_rows($query); $i++) { 
	        echo "<tr>
	        <td>".$fetched[$i][0]."</td>
	        <td>".$fetched[$i][1]."</td>
	        <td>".$fetched[$i][2]."</td>
	        <tr/>";
	    }

	    echo "</table>";
	    mysqli_free_result($query);
	    /***********************************************************************/
	    //4. Obtener la cantidad total de todos los productos enviados.

	    $query = mysqli_query($conexion,"SELECT * FROM envios");

	    $fetched = mysqli_fetch_all($query);

	    $total = 0;
	   	for ($i=0; $i < mysqli_num_rows($query); $i++) { 
	   		$total += $fetched[$i][2]; 
	    }

	    echo "El total tiene que ser 3280 y es ".$total."<br/>";
	    mysqli_free_result($query);
	    /**********************************************************************/
	   	//5. Mostrar los primeros 3 números de productos que se han enviado.

	   	$query = mysqli_query($conexion,"SELECT * FROM envios LIMIT 3");
	   	//fUNCIONA PERO DEBO CREAR DE VUELTA LA TABLA.
	    $fetched = mysqli_fetch_all($query);

	    //var_dump($fetched);

	    mysqli_free_result($query);
		/***********************************************************************/
		//6. Mostrar los nombres de proveedores y los nombres de los productos enviados.


		/**********************************************************************/
		// 7. Indicar el monto (cantidad * precio) de todos los envíos. 

		$query = mysqli_query($conexion,"SELECT * FROM envios");

		$fetched = mysqli_fetch_all($query);

		echo "<table class='table' border='1'>
	    <thead>
	        <tr>
	        <td>Numero</td>
	        <td>pNumero</td>
	        <td>Cantidad</td>
	        <td>Precio Total</td>
	        <tr/>
	    </thead>";

	    //No es un codigo dinamico si se agregan mas productos PINCHA.		. Obtener la cantidad total del producto 1 enviado por el proveedor 102.
		for ($i=0; $i < mysqli_num_rows($query) ; $i++) { 
			echo "<tr>
	        <td>".$fetched[$i][0]."</td>
	        <td>".$fetched[$i][1]."</td>
	        <td>".$fetched[$i][2]."</td>";
	        
			switch ($fetched[$i][1]) {
				case 1:
					echo "<td>".$fetched[$i][2]*1.5."</td>";
					break;
				case 2:
					echo "<td>".$fetched[$i][2]*45.89."</td>";
					break;
				case 3:
					echo "<td>".$fetched[$i][2]*15.80."</td>";
					break;
			}
			echo "<tr/>";
		}

		echo "</table>";

		mysqli_free_result($query);

		/********************************************************************/
		//8. Obtener la cantidad total del producto 1 enviado por el proveedor 102.

		$query = mysqli_query($conexion,"SELECT Cantidad FROM envios WHERE Numero like 102 and pNumero like 1");

		$fetched = mysqli_fetch_all($query);

		echo "Cantidad de total del prod 1 enviado por el prov 102 ".$fetched[0][0]."<br/><hr/>";

		mysqli_free_result($query);
		/******************************************************************/
		//9. Obtener todos los números de los productos suministrados por algún proveedor de Avellaneda
		//suministrados por algún proveedor de Avellaneda
		//------------------------------------------------
		//Hago una query para ver que prod provee el de Avellaneda.
		// Y luego otra para traer los envios.

		$query = mysqli_query($conexion,"SELECT Numero FROM proveedores WHERE Localidad like 'Avellaneda'");

		$fetched = mysqli_fetch_all($query);

		$numero = $fetched[0][0];

		mysqli_free_result($query);

		$query = mysqli_query($conexion,"SELECT pNumero FROM envios WHERE Numero like $numero");

		$fetched = mysqli_fetch_all($query);

		echo "Numeros de producto del proveedor de Avellaneda: <br/>";
		for ($i=0; $i < mysqli_num_rows($query); $i++) { 
			echo $fetched[$i][0]."<br/>";
		}
		echo "<hr/>";
		mysqli_free_result($query);

		/************************************************************************/
		//10. Obtener los domicilios y localidades 
		//de los proveedores cuyos nombres contengan la letra ‘I’.

		$query = mysqli_query($conexion,"SELECT * FROM `proveedores` WHERE Domicilio LIKE '%i%' or Localidad LIKE '%i%'");

		$fetched = mysqli_fetch_all($query);

		echo "<table class='table' border='1'>
	    <thead>
	        <tr>
	        <td>Domicilio</td>
	        <td>Localidad</td>
	        <tr/>
	    </thead>";
	                    //Devuelve cantidad de filas.
	    for ($i=0; $i < mysqli_num_rows($query); $i++) { 
	        echo "<tr>
	        <td>".$fetched[$i][2]."</td>
	        <td>".$fetched[$i][3		]."</td>
	        <tr/>";
	    }

	    echo "</table><hr/>";


	    mysqli_free_result($query);

	    /**********************************************************************************/
		//11. Agregar el producto numero 4, llamado ‘Chocolate’ 
	    //de tamaño chico y con un precio
		//de 25,35.

		$query = mysqli_query($conexion,"INSERT INTO `productos` (`pNumero`, `pNombre`, `Precio`, `Tamaño`) VALUES (4,'Chocolate',2535,'Chico') ");
		
		$query = mysqli_query($conexion,"SELECT * FROM productos WHERE 1");

		$fetched = mysqli_fetch_all($query);

		echo "<table class='table' border='1'>
	    <thead>
	        <tr>
	        <td>pNumero</td>
	        <td>pNombre</td>
	        <td>Precio</td>
	        <td>Tamaño</td>
	        <tr/>
	    </thead>";
	                    //Devuelve cantidad de filas.
	    for ($i=0; $i < mysqli_num_rows($query); $i++) { 
	        echo "<tr>
	        <td>".$fetched[$i][0]."</td>
	        <td>".$fetched[$i][1]."</td>
	        <td>".$fetched[$i][2]."</td>
	        <td>".$fetched[$i][3]."</td>
	        <tr/>";
	    }

	    echo "</table>NO FUNCIONA<hr/>";

	    mysqli_free_result($query);

	/******************************************************************************/
	//12. Insertar un nuevo proveedor (únicamente con los campos obligatorios).

	//$query = mysqli_query($conexion,"INSERT INTO `proveedores` (`Numero`,`Nombre`,`Domicilio`,`Localidad`) VALUE (104,'','','')");

	$query = mysqli_query($conexion,"SELECT * FROM proveedores where 1");

	$fetched = mysqli_fetch_all($query);

	echo "<table class='table' border='1'>
	    <thead>
	        <tr>
	        <td>Numero</td>
	        <td>Nombre</td>
	        <td>Domicilio</td>
	        <td>Localidad</td>
	        <tr/>
	    </thead>";
	                    //Devuelve cantidad de filas.
	    for ($i=0; $i < mysqli_num_rows($query); $i++) { 
	        echo "<tr>
	        <td>".$fetched[$i][0]."</td>
	        <td>".$fetched[$i][1]."</td>
	        <td>".$fetched[$i][2]."</td>
	        <td>".$fetched[$i][3]."</td>
	        <tr/>";
	    }

	    echo "</table><hr/>";

	/*****************************************************************************************/
	



	}
	else
	{
		echo "Erro en la conexcion con la base";
	}






?>