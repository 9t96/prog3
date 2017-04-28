<?php
	require_once('clases/producto.php');
	require_once('Acciones.php');
?>
<html>
<head>
	<title>Ejemplo de ALTA-LISTADO - con archivos -</title>

	<meta charset="UTF-8">
		
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
	<a class="btn btn-info" href="index.html">Menu principal</a>

	<div class="container">
		<div class="page-header">
			<h1>Ejemplos de Grilla</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>Listado de PRODUCTOS</h1>
			<?php TraerTabla();?>
		</div>
	</div>
</body>
</html>