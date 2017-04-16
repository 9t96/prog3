<?php

class MiClase
{
    private $codigo;
    private $valor;
    private $path;
    
    public function __construct($nombre=NULL,$codigo=NULL,$path=NULL)
    {
        if($nombre !==NULL && $codigo !==NULL && $path!==NULL)
        {
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->path = $path;
        }
    }
   
    public function getCodigo()
    {
        return $this->codigo;
    }
    
    public function getNombre()
    {
        return $this->nombre;      
    }
    
    public function getPath()
    {
        return $this->path;       
    }
    
    public function setCodigo($value)
    {
       $this->codigo = $value;
    }
    
    public function setNombre($value)
    {

        $this->nombre = $value;
    }
    
    public function setPath($value)
    {
        $this->path = $value;
        
    }

    public function ToString()
    {
        return $this->codigo."-".$this->nombre."-".$this->path;
    }

    public function Agregar()
    {
        $arch = fopen("productos.txt","a");
        
        if(fwrite($arch,$this->ToString()."\r\n"))
        {
            echo "Escribio exitosamente.";
        }
        else
        {
            echo "No logro escribir.";
        }
        fclose($arch);
    }
    
    //Lee de cosas y retorna un array de tipo cosas.
    public static function Mostrar()
    {
        $arc = fopen("productos.txt","r");
        
        $prod = array();

        while(!feof($arc))
        {
            $linea = fgets($arc);
            $string = explode("-",$linea);

            $string[0]=trim($string[0]);

            if ($string[0]!="") {
                $prod[] = new MiClase($string[0],$string[1],$string[2]);
            }        
        }                        
        fclose($arc);

        return $prod;
    }

}

?>