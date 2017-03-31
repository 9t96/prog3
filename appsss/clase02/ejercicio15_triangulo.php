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
        CalcularDatos();
    }

    private function CalcularDatos()
    {
        $this->_perimetro = $_base * $_altura / 2;
        $this->_superficie = $_base * $_altura;

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