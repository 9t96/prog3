<?php

class Cosa
{
    public $codigo;
    public $valor;


    public function __construct($valor,$codigo)
    {
        $this->codigo = $codigo;
        $this->valor = $valor;

    }

    public function ToString()
    {
        return $this->codigo."-".$this->valor;
    }

    public function Agregar()
    {
        $arch = fopen("cosas.txt","a");


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
    public function TraerTodos()
    {
        $arc = fopen("cosas.txt","r");

        while(!feof($arc))
        {
            //usar array explode.
            $datosfgets($arc); 
            
        }
        
        $string = explode("-",fgets($arc));



        fclose($arc);

        return //array cargado.
    }

}

?>