<?php
	function TraerTabla()
	{
		
			$conexion = new PDO("mysql:host=localhost;dbname=productos","root","");

			$statement = $conexion->prepare("SELECT nombre AS name,codigo_barra AS codigo, path_foto AS pathh FROM producto WHERE 1");


			$statement->bindColumn(2,$codigo);
			$statement->bindColumn(1,$name);
			$statement->bindColumn(3,$pathh);

			$statement->execute();

			echo "<table class='table'>
					<thead>
						<tr>
							<th>  COD. BARRA </th>
							<th>  NOMBRE     </th>
							<th>  FOTO       </th>
						</tr> 
					</thead>";   	

			while($statement->fetch(PDO::FETCH_BOUND))
			{
				
						echo " 	<tr>
								<td>".$codigo."</td>
								<td>".$name."</td>
								<td><img src='archivos/".$pathh."' width='100px' height='100px'/></td>
							</tr>";
			}

			echo "</table>";

			$conexion = NULL;	
	}


function SeSubioOk($mipost)
{
		//INDICO CUAL SERA EL DESTINO DEL ARCHIVO SUBIDO
	$destino = "archivos/" . $mipost["archivo"]["name"];

	$uploadOk = TRUE;

	$tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);

	//VERIFICO QUE EL ARCHIVO NO EXISTA
	if (file_exists($destino)) {
		$uploadOk = FALSE;
		$mensaje = "El archivo ya existe. Verifique!!!";
		include("mensaje.php");
	}
	//VERIFICO EL TAMAÑO MAXIMO QUE PERMITO SUBIR
	if ($mipost["archivo"]["size"] > 500000) {
		$uploadOk = FALSE;
		$mensaje = "El archivo es demasiado grande. Verifique!!!";
		include("mensaje.php");
	}

	//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
	//IMAGEN, RETORNA FALSE
	$esImagen = getimagesize($mipost["archivo"]["tmp_name"]);

	if($esImagen === FALSE) {//NO ES UNA IMAGEN
		$uploadOk = FALSE;
		$mensaje = "S&oacute;lo son permitidas IMAGENES.";
		include("mensaje.php");
	}
	else {// ES UNA IMAGEN

		//SOLO PERMITO CIERTAS EXTENSIONES
		if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
			&& $tipoArchivo != "png") {
			$uploadOk = FALSE;
			$mensaje = "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
			include("mensaje.php");
		}
	}

	return $uploadOk;
}


?>