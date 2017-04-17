<!doctype html>
<html>
	<head>
		<title>Env&iacute;o por POST</title>
		
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
				<h1>Env&iacute;o por POST hacia otra p&aacute;gina</h1>
			
				<form action="destinoPost.php" method="post">
					<span>Nombre</span><input type="text" name="txtNombre" required />
					<br/>
					<span>Edad</span><input type="text" name="txtEdad" required />
					<br/>
					<input type="submit" value="Enviar por POST" class="MiBotonUTN" />
				</form>
				
			</div>
			
		</div>
	</body>
</html>