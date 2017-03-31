<?php

class Punto
{
    private $_x;
    private $_y;

    function __contruct($y,$x)
    {
        $this->_y = $y;
        $this->_x = $x;
    }

    function GetX()
    {
        return $this->_x;
    }

    function GetY()
    {
        return $this->_y;
    }

}


?>