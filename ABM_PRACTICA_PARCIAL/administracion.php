<?php
include_once("persona.php");

if (isset($_FILES["archivo"]) && isset($_POST["btnSubmit"])) 
{
		
		$destinofinal = "Pictures/".$_FILES["archivo"]["name"];
		$uploadok = false;

		/////////
		//VERIFICO SI EXISTE EN DESTINO
		/////////
		if (file_exists($destinofinal)) {
			echo "El archivo ya existe.";
		}
		else
		{
			$uploadok = true;
		}
		/////////
		//VERIFICO TAMAÑO
		/////////
		if ($_FILES["archivo"]["size"] > 1000000) {
			echo "Error el archivo es demasiado grande";
		}
		else
		{
			$uploadok = true;
		}

		$esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);
		$extension = pathinfo($destinofinal,PATHINFO_EXTENSION);
		
		/////////
		//VERIFICO SI ES IMAGEN, SI NO LO ES VEO LA EXTENSION.
		/////////
		if ($esImagen === FALSE) {
				echo "Error el archivo no es una imagen..";
		}
		else
		{	
			if ($extension != "jpg" && $extension != "jpeg" && $extension != "gif" && $extension != "png") {
				echo "Error la extension de la imagen no es valida.";
			}
			else
			{
				$uploadok = true;
			}
			
		}

		$subioBien = FALSE;
		
		if ($uploadok !== TRUE) {
				echo "No se pudo subir el archivo...";
		}
		else
		{
			if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destinofinal)) {
				echo "El archivo se subio correctamente";
				$subioBien = true;
			}
			else
			{
				echo "Error al subir el archivo";
			}
		}

		if ($subioBien == TRUE)
		{
			$persona = new persona($_POST["nombre"],$_POST["dni"],$_POST["sexo"],basename($destinofinal));
			$persona->GuardarEnArchivo();
			/************************************************************************************************/
			//GUARDO EN DB.		
			
			try 
			{
				$pdoObj = new PDO('mysql:host=localhost;dbname=bdpractica','root','');
			}
			catch (PDOException $e) 
			{
				echo "Error".$e->getMessage();
			}

			$nombre =	$_POST["nombre"];
			$dni 	=	$_POST["dni"];
			$sexo 	=	$_POST["sexo"];
			$path 	= 	basename($destinofinal);

			$statement = $pdoObj->prepare("INSERT INTO `personas`(`nombre`, `dni`, `sexo`, `pathh`) VALUES (:nombre,:dni,:sexo,:pathh)");

			$statement->bindParam(':nombre',$nombre);
			$statement->bindParam(':dni',$dni);
			$statement->bindParam(':sexo',$sexo);
			$statement->bindParam(':pathh',$path);

			if ($statement->execute()) {
				echo "Se actualizo la base de datos exitosamente!!";
			}
			else
			{
				echo "Ha habido un error al intentar guardar la persona en la base de datos";
			}

			$pdoObj = NULL;

		}

		include_once("living.php");
}
else if(isset($_POST["btnListar"]))
{
		$datos = Persona::ListarTodos();

		echo "<table align='center' border='1'>
				<thead>
					<tr>
						<th>Nombre</th>
						<th>DNI</th>
						<th>Sexo</th>
						<th>Foto</th>
					</tr>
				</thead>";

				foreach ($datos as $value) {
					echo "<tr>
						<td>".$value->getName()."</td>
						<td>".$value->getDni()."</td>
						<td>".$value->getSexo()."</td>
						<td><img height='100' width='100' src='Pictures/".$value->getPathFoto()."'></td>
					</tr>";
				}
		
		echo "</table>";
		
		include_once("living.php");
}
else
{
	echo "No selecciono ninguna foto.";
}



?>