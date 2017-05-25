<?php

class Container
{
	public $numero;
	public $descripcion;
	public $path;
	public $pais;

    public function __construct($numero=NULL,$pais=NULL,$descripcion=NULL,$path=NULL)
    {
        if($numero !==NULL && $pais !==NULL && $descripcion!==NULL  && $path!==NULL)
        {
            $this->pais = $pais;
            $this->numero = $numero;
            $this->path = $path;
            $this->descripcion = $descripcion;
        }
    }

    public function setPais($value)
    {
       $this->pais = $pais;
    }
    
    public function setNumero($value)
    {

        $this->numero = $value;
    }
    
    public function setPath($value)
    {
        $this->path = $value;
        
    }

    public function setDescripcion($value)
    {
        $this->descripcion = $value;
        
    }

   	public function getPais()
    {
        return $this->pais;
    }
    
    public function getNumero()
    {
        return $this->numero;      
    }

    public function getDescripcion()
    {
        return $this->descripcion;      
    }

    public function getPath()
    {
        return $this->path;      
    }

    public function GuardarEnBD()
    {
    	try
		{   
			$conexion = new PDO("mysql:host=localhost;dbname=pp_prog_lll","root","");

		}
		catch(PDOException $e)
		{
			 echo "ERROR".$e->getMessage();
		}

	    $statement = $conexion->prepare("INSERT INTO containers (`numero`, `descripcion`, `pais`,`foto`) VALUES (:numero,:descrip,:pais,:foto)");
	    
        $nmbr = $this->getNumero();
        $descrip = $this->getDescripcion();
        $pathh = $this->getPath();
        $pais = $this->getPais();      
	    
        $statement->bindParam(':numero',$nmbr);
	    $statement->bindParam(':descrip',$descrip);
	    $statement->bindParam(':pais',$pais);
	    $statement->bindParam(':foto',$pathh);

	    if ($statement->execute()) 
	    {
	    	echo "Se guardo con exito en la base de datos.";
	    }	
	    else
	    {
	    	echo "Erro en la base de datos";
	    }
    }

    public static function EliminarBD($id)
    {
        try
        {   
            $conexion = new PDO("mysql:host=localhost;dbname=pp_prog_lll","root","");

        }
        catch(PDOException $e)
        {
             echo "ERROR".$e->getMessage();
        }  

        $statement = $conexion->prepare("DELETE FROM `containers` WHERE numero LIKE :nmbr");

        $statement->bindParam(':nmbr',$id);

        if($statement->execute()) 
        {
            return TRUE;
        }   
        else
        {
            return FALSE;
        }
    }

    public static function TraerTabla()
    {
        
            $conexion = new PDO("mysql:host=localhost;dbname=pp_prog_lll","root","");

            $statement = $conexion->prepare("SELECT `numero` AS nmbr, `descripcion` as descrip, `pais` as pais, `foto` as pathh FROM `containers` WHERE 1");

            

            $statement->bindColumn(1,$nmbr);
            $statement->bindColumn(2,$descrip);
            $statement->bindColumn(4,$pathh);
            $statement->bindColumn(3,$pais);

            $statement->execute();

            echo "<table class='table' border='1'>
                    <thead>
                        <tr>
                            <th>  Numero </th>
                            <th>  Descripcion     </th>
                            <th>  Pais  </th>
                            <th>  FOTO       </th>
                            <th>Eliminar</th>
                        </tr> 
                    </thead>";   


            while($statement->fetch(PDO::FETCH_BOUND))
            {
                
                        echo "  <tr>
                                <td>".$nmbr."</td>
                                <td>".$descrip."</td>
                                <td>".$pais."</td>
                                <td><img src='../Punto5/Fotos/".$pathh."' width='100px' height='100px'/></td>
                                <td><a href='eliminar.php?numero=".$nmbr."'>Eliminar</a></td>
                            </tr>";
            }

            echo "</table>";

            $conexion = NULL;   
    }
}


?>