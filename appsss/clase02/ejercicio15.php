<?php

abstract class FiguraGeometrica
{
    protected $_perimetro;
    protected $_color;
    protected $_superficie;

    function __construct()
    {
        
    }

    private function CalcularDatos(){}

    public function Dibujar(){}

    public function GetColor($color)
    {
        return $this->_color;
    }

    public function SetColor()
    {
        $this->_color = $color;
    }

    public function ToString()
    {
        return "Perimetro= $_perimetro"." Superficie=$_superficie"." Color=$_color";
    }
}



?>