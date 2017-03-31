<?php


$num = rand(20,60);
echo "Numero a transformar a letra $num";

$numCadena = array_map('intval',str_split($num));


$numeroEnLetras = "";



if ($numCadena[0]==2 && $numCadena[1]==0) {
    $numeroEnLetras = "El numero en letras es Veinte";
}
else
{
    switch ($numCadena[0]) 
    {
    case '2':
        $numeroEnLetras = "El numero $num en letras es Veinti";
        break;
    case '3':
        $numeroEnLetras = "El numero $num en letras es Treinta";
        break;
    case '4':
        $numeroEnLetras = "El numero $num en letras es Cuarenta";
        break;
    case '5':
        $numeroEnLetras = "El numero $num en letras es Cincuenta";
        break;
    case '6':
        $numeroEnLetras = "El numero $num en letras es Sesenta";
        break;
    }

}


if ($numCadena[1]!=0) 
{
    switch ($numCadena[1]) 
    {
        case '1':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y uno";        
            else 
                $numeroEnLetras = $numeroEnLetras."uno";
            break;
        case '2':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y dos";        
            else 
                $numeroEnLetras = $numeroEnLetras."dos";
            break;
        case '3':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y tres";        
            else 
                $numeroEnLetras = $numeroEnLetras."tres";
            break;
        case '4':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y cuatro";        
            else 
                $numeroEnLetras = $numeroEnLetras."cuatro";
            break;
        case '5':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y cinco";        
            else 
                $numeroEnLetras = $numeroEnLetras."cinco";
            break;
        case '6':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y seis";        
            else 
                $numeroEnLetras = $numeroEnLetras."seis";
            break;
        case '7':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y siete";        
            else 
                $numeroEnLetras = $numeroEnLetras."siete";
            break;
        case '8':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y ocho";        
            else 
                $numeroEnLetras = $numeroEnLetras."ocho";
            break;
        case '9':
            if($numCadena[0]!=2)
                $numeroEnLetras = $numeroEnLetras." y nueve";        
            else 
                $numeroEnLetras = $numeroEnLetras."nueve";
            break;
    }
}


echo $numeroEnLetras;


?>