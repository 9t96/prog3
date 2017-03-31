<?php
include "Punto.php"

class Rectangulo
{
    private Punto $_vertice1;
    private Punto $_vertice2;
    private Punto $_vertice3;
    private Punto $_vertice4;
    var $area;
    var $ladoUno;
    var $ladoDos;
    var $perimetro;

    function __contruct(Punto v1,Punto v3)
    {
        $this->_vertice1 = v1

    }

    function Dibujar()
    {
        
    }
}

?>