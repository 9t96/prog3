<?php
class cd
{
	public $id;
	public $interpret;
	public $jahr;
	public $titel;
	public $foto;
	
	public static function TraerTodos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT id, interpret, jahr, titel, foto
				FROM cds";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		return $consulta->fetchall();
		
	}

	public static function TraerPorId($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT id, interpret, jahr, titel, foto
				FROM cds WHERE id=?";
			
		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		
		$consulta->bindParam(1,$id);

		$consulta->execute();

		return $consulta->fetchall();
		
	}

	public static function EliminarPorId($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "DELETE FROM cds WHERE id=?";
			
		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		
		$consulta->bindParam(1,$id);

		if($consulta->execute())
		{
			return TRUE;
		}		
		else
		 	return FALSE;
	}
	
	public static function UpdateCd($id,$titulo,$interprete)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "UPDATE cds SET titel=?,interpret=? WHERE id =?";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);

		$consulta->bindParam(1,$titulo);
		$consulta->bindParam(2,$interprete);
		$consulta->bindParam(3,$id);
			
		if($consulta->execute())
		{
			return TRUE;
		}		
		else
		 	return FALSE;
	}

	public static function AgregarCd($info,$request)
	{	
		$destino="./fotos/";
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "INSERT INTO cds (titel, interpret, jahr, foto) VALUES (?,?,?,?)";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);

		//Metodo de slim que devuelve el archivo subido..
		$archivos = $request->getUploadedFiles();

		$nombreAnterior=$archivos['foto']->getClientFilename();
		$extension = explode(".", $nombreAnterior)  ;

		$extension = array_reverse($extension);

		$destinoFinal = $destino.$info["titel"] . "." . $extension[0];

		//Metodo de slim que mueve archivo.
		$archivos['foto']->moveTo($destinoFinal);

		$consulta->bindParam(1,$info["titel"]);
		$consulta->bindParam(2,$info["interpret"]);
		$consulta->bindParam(3,$info["anio"]);
		$consulta->bindParam(4,$destinoFinal);
			
		if($consulta->execute())
			return TRUE;	
		else
		 	return FALSE;
	}

	//IMPLEMENTAR TRAER UNO POR ID
	//IMPLEMENTAR AGREGAR
	//IMPLEMENTAR ACTUALIZAR
	//IMPLEMENTAR ELIMINAR

	//POST AGREGAR PROFE
/*
	$app->post('/cd[/]', function (Request $request, Response $response) {
  
		$destino="./fotos/";
		$ArrayDeParametros = $request->getParsedBody();
		var_dump($ArrayDeParametros);
		$titulo= $ArrayDeParametros['titulo'];
		$cantante= $ArrayDeParametros['cantante'];
		$año= $ArrayDeParametros['anio'];
		
		$micd = new cd();
		$micd->titulo=$titulo;
		$micd->cantante=$cantante;
		$micd->año=$año;
		$micd->InsertarElCdParametros();

		$archivos = $request->getUploadedFiles();
		//var_dump($ArrayDeParametros);
		//var_dump($archivos);
		//var_dump($archivos['foto']);


		$nombreAnterior=$archivos['foto']->getClientFilename();
		$extension= explode(".", $nombreAnterior)  ;
		//var_dump($nombreAnterior);
		$extension=array_reverse($extension);

		$archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
		$response->getBody()->write("cd");

		return $response;

	});*/
	
}