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
	require_once("Acciones.php");
?>
	<div class="container">
	
		<div class="page-header">
			<h1>PRODUCTOS</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>ALTA-BAJA-LISTADO - con archivos -</h1>
			<?php TraerTabla(); ?>
			<form id="FormIngreso" method="post" action="administracion.php">
				<input type="text" name="codigo" placeholder="Ingrese codigo de barras"  />
				<input type="submit" class="MiBotonUTN" name="elimiar" />
			</form>
		
		</div>
	</div>
</body>
</html>