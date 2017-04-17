<?php 
require_once ('Clases/MiClase.php');

if(isset($_POST["leer"]))
{
    $datos = MiClase::Mostrar();

    echo     "<table class='table' border='1px solid black' border='1' width='100%' align='center'>
        <thead>
        <tr style='background-color:powderblue;'>
            <th>Nombre</th>
            <th>Codigo</th>   
            <th>Imagen</th>
        </tr>
        </thead>";

    foreach ($datos as $value) {
        echo "  <tr>
                    <td> ".$value->getCodigo()."</td>
                    <td>".$value->getNombre()."</td>
                    <td>"."<img src='Archivos/".$value->getPath()."'width='100px' height='100px'/></td>"."
                </tr>
            ";
    }

    echo "</table>";
}
else if(isset($_POST["enviar"]) && isset($_FILES["archivo"]))
{
    $path = "Archivos/".$_FILES["archivo"]["name"];
    move_uploaded_file($_FILES["archivo"]["tmp_name"],$path);
    $prod = new MiClase($_POST["txtName"],$_POST["txtCodBarra"],basename($_FILES["archivo"]["name"]));
    $prod->Agregar();
}













/* //1param= path //2param = modod de apertura.
$arc = fopen("textos.txt","a");

         //Archivo abierto //Metodo= get,post o req   
if(fwrite($arc,$_POST["txtName"]."\r\n"))
{
    echo "Escribio exitosamente.";
}
else
{

    echo "No logro escribir.";
}

fclose($arc);*/

?>