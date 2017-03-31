<!doctype html>
<html>
    <head>
        <meta charset="utf-8"//>
        <title>Ejercicio 7</title>
    </head>
    
<body>
    <?php

    $impares = array(); //Definicion de array vacio.
    
    for ($i=0; $i < 10; $i++) { 
        if($i%2!=0)
            array_push($impares,$i);
    }

    echo "FOR<br>";//Dentro del bloque php cualquie etiqueta debe aparecer dentro de un echo.
    
    for ($i=0; $i < count($impares); $i++) { 
        echo "$impares[$i]<br>";      
    }
    
    
    echo "WHILE<br>";
    
    $t = 0;
    while ($t < count($impares)) {     
        echo "$impares[$t]<br>"; 
        $t++;       
    }
    
    
    echo "FOR EACH<br>";
    
    foreach ($impares as $value) {
        echo "$value<br>"; 
    }

    ?>
</body>


</html>