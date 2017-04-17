<?php

//Intento conectar.
$rsc = mysqli_connect("localhost","root","","cdcol");

if($rsc)
{//Conecto.
    
    //Ejecuto una consulta.
    $table = mysqli_query($rsc,"SELECT * FROM cds where 1");
}
    //Trae una fila y deja el cursor para leer la proxima.
    //Lo puedo traer como objeto u array.
    //$fila = mysqli_fetch_object($table);

//Lo recorro y muestro.
/*for ($i=0; $i < mysqli_num_rows($table); $i++) { 
    $fila = mysqli_fetch_array($table);
    var_dump($fila);
    echo "<br/>";
}*/
    /*echo $fila->id."<br/>";
    var_dump($fila);

    $fila = mysqli_fetch_object($table);
    echo $fila->id."<br/>";*/


//Fetch_all trae todas la filas indexadas.
$fila = mysqli_fetch_all($table);
//var_dump($fila);

echo "<table class='table' border='1'>
    <thead>
        <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Interp</td>
        <td>AÑo</td>
        <tr/>
    </thead>";
                    //Devuelve cantidad de filas.
    for ($i=0; $i < mysqli_num_rows($table); $i++) { 
        echo "<tr>
        <td>".$fila[$i][3]."</td>
        <td>".$fila[$i][0]."</td>
        <td>".$fila[$i][1]."</td>
        <td>".$fila[$i][2]."</td>
        <tr/>";
    }
       
    echo "</table>";

    //Libero la consulta a la tabla.
    mysqli_free_result($table);
    //Consulta de escritura en tabla.
    $table = mysqli_query($rsc,"INSERT INTO `cds`(`titel`, `interpret`, `jahr`, `id`) VALUES ('Jorge','Mendez',2056,'')");
    //Recupero id del que acabo de escribir.
    $maxid = mysqli_insert_id($rsc);
    //Modifico el id recien 
    $table = mysqli_query($rsc,"UPDATE `cds` SET `titel`='Modificado',`interpret`='cado',`jahr`=0000 where id like $maxid");

    $table = mysqli_query($rsc,"DELETE FROM `cds` WHERE jahr like 9999");

?>