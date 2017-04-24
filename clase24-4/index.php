<?php

try
{   
    //Objeto pdo
	$conexion = new PDO("mysql:host=localhost;dbname=cdcol","root","");

}
catch(PDOException $e)
{
	 echo "ERROR".$e->getMessage();
}

    /*$query = $conexion->query("SELECT * FROM cds WHERE 1");
    
    $fetched  = $query->fetchAll();

    for ($i=0; $i < $query->num_rows(); $i++) { 
        echo $fetched->title.$fetched->interpret.$fetched->jahr;
    }*/

    $valordos = "titulo x valor";
    $valortres = "interprete por valor";
    $valorcuatro = "666";

    
    /********************POR NOMBRE ******************/
    //$statement = $conexion->prepare("INSERT INTO cds (`titel`, `interpret`, `jahr`) VALUES (:titulo,:interp,:anio)");
    
    //$statement->bindParam(':titulo',$valordos);
    //$statement->bindParam(':interp',$valortres);
    //$statement->bindParam(':anio',$valorcuatro);

    /************************POSICIONALES**************/
    //*$statement = $conexion->prepare("INSERT INTO cds (`titel`, `interpret`, `jahr`) VALUES (?,?,?)");

    //$statement->bindParam(1,$valordos);
    //$statement->bindParam(2,$valortres);
    //$statement->bindParam(3,$valorcuatro);


    $statement->execute();


?>