<?php

$cadenaOperadores = array("+","-","/","*");
$operador = array();
$op1 = rand(1,100);
$op2 = rand(1,100);

//Selecciono operador.
$operador =array_rand($cadenaOperadores);
echo "La operacion a utilizar sera de la key nº $operador";
echo"           Numero a operar $op1 y $op2";
switch ($operador) {
    case '0':
        $op1 = $op1 + $op2;
        break;
    case '1':
        $op1 = $op1 - $op2;
        break;
    case '2':
        $op1 = $op1 / $op2;
        break;
    case '3':
        $op1 = $op1 * $op2;
        break;
}

echo "         El resultado de la operacion es $op1";

?>