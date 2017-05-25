<?php
$usuario = $_POST["usuario"];
$fechaNac = $_POST["fechaNac"];
$email = $_POST["email"];
$password = $_POST["password"];

if($usuario === "pepe" && $password === "123456")
    echo "Usuario: {$usuario}<br>Fecha de nacimiento: {$fechaNac}<br>E-mail: {$email}";
else
    echo "ERROR EN LOGIN";