<?php
require_once ('ejercicio15.php');

class Triangulo extends FiguraGeometrica
{
    private $_altura;
    private $_base;

    function __construct($b,$n)
    {
        parent::__construct();
        $this->_base=$b;
        $this->_altura=$n;
        $this->CalcularDatos();
    }

    private function CalcularDatos()
    {
        parent::$_perimetro = $this->_base * $this->_altura / 2;
        parent::$_superficie = $this->_base * $this->_altura;

    }


    public function Dibujar()
    {

    }

    public function ToString()
    {
        return "Altura=$this->$_altura"."Base=$this->$_base";
    }


}

?>