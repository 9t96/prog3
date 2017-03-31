<?php


$cadena = date("d,F,o");
$mes = date("m");
$dia=date("d");
switch($mes)
{
    case 1:
    case 2:
    case 3:
    echo "Es verano";
    break;
    case 4:
    case 5:
    case 6:
    echo "Es otoño";
    break;
    case 7:
    case 8:
    case 9:
    echo "Es invierno";
    case 10:
    case 11:
    case 12:
    echo "Es primavera";
}


echo $cadena;

?>