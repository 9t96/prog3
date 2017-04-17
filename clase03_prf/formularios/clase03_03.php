<!doctype html>
<html>
	<head>
		<title>Env&iacute;o por GET</title>
		
		<meta charset="UTF-8">
        
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="estilo.css">
		
	</head>
	<body>
		<div class="container">
			
			<div class="page-header">
                <h1>FORMULARIOS</h1>      
            </div>
			
			<div class="CajaInicio animated bounceInRight">
				<h1>Env&iacute;o por GET hacia la misma p&aacute;gina</h1>
			
				<form action="clase03_03.php" method="get">
					<span>Nombre</span><input type="text" name="txtNombre" required />
					<br/>
					<span>Edad</span><input type="text" name="txtEdad" required />
					<br/>
					<input type="submit" value="Enviar por GET" class="MiBotonUTN" />
				</form>
				
			</div>
			<div style="font-size:large">
				<br/><br/><br/>
				<?php 
					if(isset($_GET["txtNombre"]) && isset($_GET["txtEdad"]))
					{
				?>
						Su nombre es <?php echo $_GET["txtNombre"]; ?>
						y tiene <?php echo $_GET["txtEdad"]; ?> a&ntilde;os
				<?php
					}
				?>
			</div>
		</div>
	</body>
</html>