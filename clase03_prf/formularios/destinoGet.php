<!doctype html>
<html>
	<head>
		<title>Recepci&oacute;n por GET</title>
		
		<meta charset="UTF-8">
        
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="estilo.css">
		
	</head>
	<body style="background:#F6D8CE;color:#0B0B61">
		<div class="container">
			
			<div class="page-header">
                <h1>FORMULARIOS</h1>      
            </div>
			
			<div class="CajaInicio animated bounceInRight">
				<h1>Recepci&oacute;n por GET</h1>
			
				<form action="clase03_01.php" >
					<span>Nombre</span><input type="text" value="<?php echo $_GET["txtNombre"]; ?>" readonly />
					<br/>
					<span>Edad</span><input type="text" value="<?php echo $_GET["txtEdad"]; ?>" readonly />
					<br/>
					<input type="submit" value="Volver" class="MiBotonUTN" />
				</form>
				
			</div>
			
		</div>
	</body>
</html>