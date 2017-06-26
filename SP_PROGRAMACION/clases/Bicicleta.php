<?php

class Bicicleta
{

	public $id;
	public $marca;
	public $color;
	public $rodado;

	public function __construct($id,$marca,$color,$rodado)
	{
		if ($id !== NULL && $color !== NULL && $marca !== NULL
			&& $rodado !== NULL) {
			

				 $this->id  =$id;
				 $this->marca = $marca;
				 $this->color = $color;
				 $this->rodado = $rodad;

		}
	}


	public static function AltaBicicleta($id,$color,$marca,$rodado)
	{
		$conexion  = AccesoDatos::dameUnObjetoAcceso();

		$statement = $conexion->RetornarConsulta("INSERT INTO `bicis`(`id`, `color`, `rodado`, `marca`) VALUES (?,?,?,?)");

		$statement->bindParam(1,$id);
        $statement->bindParam(2,$color);
        $statement->bindParam(3,$rodado);
        $statement->bindParam(4,$marca);

        if ($statement->execute()) {
        	return TRUE;
        }
        else
        {
        	return FALSE;
        }
	}

	public static function ListarBicicletas()
	{
		$bicis = NULL;

		$conexion  = AccesoDatos::dameUnObjetoAcceso();

		$statement = $conexion->RetornarConsulta("SELECT * FROM `bicis` WHERE 1");

		if ($statement->execute()) {
			$bicis = $statement->fetchall(PDO::FETCH_ASSOC);
		}

		return $bicis;
	}

	public static function ListarPorColor($color)
	{
		$bicis = NULL;

		$conexion  = AccesoDatos::dameUnObjetoAcceso();

		$statement = $conexion->RetornarConsulta("SELECT * FROM `bicis` WHERE color LIKE ?");

		$statement->bindParam(1,$color);

		if ($statement->execute()) {
			$bicis = $statement->fetchall(PDO::FETCH_ASSOC);
		}

		return $bicis;
	}

	public static function ListarPorId($id)
	{
		$conexion  = AccesoDatos::dameUnObjetoAcceso();

		$statement = $conexion->RetornarConsulta("SELECT * FROM `bicis` WHERE id LIKE ?");

		$statement->bindParam(1,$id);

		if ($statement->execute()) {
			$bicis = $statement->fetchall(PDO::FETCH_ASSOC);
		}
		else
		{
			return FALSE;
		}

		return $bicis;
	}

	public static function BorrarPorId($id)
	{
		$conexion  = AccesoDatos::dameUnObjetoAcceso();

		$statement = $conexion->RetornarConsulta("DELETE FROM `bicis` WHERE id = ?");

		$statement->bindParam(1,$id);

		if ($statement->execute()) {
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public static function VentaBici($idbici,$nombrecliente,$precio,$request)
	{

		$destino="./FotosVentas";
		
		$conexion = AccesoDatos::dameUnObjetoAcceso();

		$statement = $conexion->RetornarConsulta("INSERT INTO `ventas`(`idBicicleta`, `nombreCliente`, `fecha`, `precio`) VALUES (?,?,NOW(),?)");

		//Metodo de slim que devuelve el archivo subido..
		$archivos = $request->getUploadedFiles();

		$nombreAnterior = $archivos['foto']->getClientFilename();
		
		$extension = explode(".", $nombreAnterior)  ;

		$extension = array_reverse($extension);

		$destinoFinal = $destino.$idbici . $nombrecliente . "." . $extension[0];

		//Metodo de slim que mueve archivo.
		$archivos['foto']->moveTo($destinoFinal);

		$statement->bindParam(1,$idbici);
		$statement->bindParam(2,$nombrecliente);
		$statement->bindParam(3,$precio);
			
		if($statement->execute())
			return TRUE;	
		else
		 	return FALSE;
	
	}












}
?>