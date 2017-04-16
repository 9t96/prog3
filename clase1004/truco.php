<?php

if(isset($_FILES["archivo"]))
{
    $destino = "Archivos\\" . $_FILES["archivo"]["name"];
    move_uploaded_file($_FILES["archivo"]["temp_name"],$destino);
    echo "subio correctamente";
    echo "<img src='Archivos\\" . $_FILES['archivo']['name'] . "'>";
}



?>