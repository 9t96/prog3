<!doctype html>
<html>
<head>
	<title>BAJA de PRODUCTOS</title>
	  
		<meta charset="UTF-8">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<a class="btn btn-info" href="index.html">Menu principal</a>
<?php     
	require_once("clases\producto.php");
	require_once("administracion.php");
	require_once("Acciones.php");
?>
	<div class="container">
	
		<div class="page-header">
			<h1>PRODUCTOS</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>ALTA-BAJA-MODIFICACION-LISTADO - con BD -</h1>
			<?php TraerTabla(); ?>
			<form id="FormIngreso" method="post" action="administracion.php">
				<input type="text" name="oldcodigo" placeholder="Ingrese el codigo de barras del producto a modificar."  />
				Nuevos valores:
				<input type="text" name="newNombre" placeholder="Nuevo Nombre"  />
				<input type="text" name="newNCode" placeholder="Nuevo Codigo de Barras"  />
				<input type="file" name="archivo" /> 
				<input type="submit" class="MiBotonUTN" name="modificar" />
			</form>
		
		</div>
	</div>
</body>
</html>
