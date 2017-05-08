<?php

class Persona
{
	private $name;
	private $dni;
	private $sexo;
	private $path;

	public function __construct($name,$dni,$sexo,$path)
	{
		if ($name !== NULL && $dni !== NULL && $sexo !== NULL && $path !== NULL) {
			$this->name = $name;
			$this->dni = $dni;
			$this->sexo = $sexo;
			$this->path = $path;		
		}
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($value)
	{
		$this->name = $value;
	}


	public function getDni()
	{
		return $this->dni;
	}

	public function setDni($value)
	{
		$this->dni = $value;
	}


	public function getSexo()
	{
		return $this->sexo;
	}

	public function setSexo($value)
	{
		$this->sexo= $value;
	}


	public function getPathFoto()
	{
		return $this->path; 
	}

	public function setPathFoto($value)
	{
		$this->path = $value;
	}

	public function ToString()
	{
		return $this->getName().'-'.$this->getDni().'-'.$this->getSexo().'-'.$this->getPathFoto()."\r\n";
	}
	
	public function GuardarEnArchivo()
	{
		$archivo = fopen("archivos/personas.txt","a");

		if ($archivo !== FALSE) 
		{		
			if (!fwrite($archivo,$this->ToString())) 
			{
				echo "Error al escribir en archivo";
			}
		}

		fclose($archivo);
	}

	public static function ListarTodos()
	{
		$arrayPersonas = array();

		$archivo = fopen("archivos/personas.txt", "r");

		while(!feof($archivo)) {
			
			$unalinea = fgets($archivo);

			$exploded = explode("-",$unalinea);

			$exploded[0] = trim($exploded[0]);

			if ($exploded[0]!="") {
			$arrayPersonas[]  = new Persona($exploded[0],$exploded[1],$exploded[2],$exploded[3]);			}

		}
		
		fclose($archivo);

		return $arrayPersonas;
	}
}


?>