<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="funciones.js"></script>
</head>
<body style='background-color: <?php echo $_COOKIE["color".$_SESSION["usuario"]]?>' >

USTEDE SE LOGEO COMO <?php echo $_SESSION["usuario"]?>
<br>
<input type="color" id="color" ><input type="button" id="btnColor" name="" value="Guardar Color" onclick="GuardarCookieColor()">
<br><br>
<input type="button" id="unlog" name="" onclick="Deslogear()" value="LogOut">
</body>
</html>

