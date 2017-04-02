<?php

class Auto
{
    private $_color = array();
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca,$color)
    {
        $this->_marca = $marca;
        $this->_color = $color;
    }

    //Lo llamare por el nombre de la clase y ::
    public static function __constPrice($marca,$color,$precio)
    {
        $this->__construct($marca,$color);
        $this->_precio = $precio;
    }

    public static function __constDate($marca,$color,$precio,$date)
    {
        $this->__constPrice($marca,$color,$precio);
        $this->_date = $date;
    }

    public function getPrecio()
    {
        return $this->_precio;
    }

    public function getColor()
    {
        return $this->_color;
    }

    public function getMarca()
    {
        return $this->_marca;
    }

    public function getFecha()
    {
        return $this->_marca;
    }

    public function AgregarImpuestos($imp)
    {
        $this->_precio += $imp;
    }

    public static function MostrarAuto($obj)
    {
        return "Marca: ".$obj->getMarca()."-"."Color: ".$obj->_getColor()"-"."Precio:  $".$obj->_getPrecio()."-"."Fecha: ".$obj->_date;
    }

    public function Equals($car1,$car2)
    {
        if((string)$car1->_marca == (string)$car2->_marca )
        {
            return true;
        }

        return false;
    }

    public static function Add($car1,$car2)
    {
        if((string)$car1->_marca == (string)$car2->_marca && (string)$car1->_color == (string)$car2->_color)
        {
            return $car1->_precio + $car2->_precio;
        }

        echo "Los autos son distintos";
        return 0;
    }













}



?>
