<?php
require_once ('ejercicio15.php');

class Rectangulo extends FiguraGeometrica
{
    private $_ladoUno;
    private $_ladoDos;

    function __construct($l1,$l2)
    {
        parent::__construct();
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;  
        $this->CalcularDatos();
    }

    private function CalcularDatos()
    {
        $this->_perimetro = (($this->_ladoUno)*2) + (($this->_ladoDos)*2);
        $this->_superficie = $this->_ladoUno * $this->_ladoDos;

    }

    public function Dibujar()
    {
        for ($i=0; $i < $this->_ladoDos; $i++) { 
            
            for ($t=0; $t < $this->_ladoUno; $t++) { 
                echo "*";
            }
            $t=0;
            echo "<br/>";
        }
    }

    public function ToString()
    {
        
    
    }

}

?>