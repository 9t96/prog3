<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" >
		
		<div class="text-centered" style="margin:0 auto">
			
			<form class="form" action="index.php" method="post">
			
			<input class="form-control" type="text" name="num1" id="n1" placeholder="Numero uno" style="width:250px">
			
			<input class="form-control" type="text" name="num2" id="n2" placeholder="Numero dos" style="width:250px">
			
			<input class="btn btn-primary" type="submit" name="btnSuma" value="Sumar">
			
			<input class="btn btn-primary" type="submit" name="btnMultiplicar" value="Multiplicar">
		
			<input class="btn btn-primary" type="submit" name="btnRestar" value="Restar">
		</form>
		</div>
	
	</div>
	<?php

		if (isset($_POST["num2"]) && isset($_POST["num1"])) 
		{
			
			require_once('/lib/nusoap.php');

			$host = 'http://localhost:8080/WebServices/MyWs.php';


			$client = new nusoap_client($host . '?wsdl');


			$err = $client->getError();
			if ($err) {
				echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
				die();
			}

			if (isset($_POST["btnSuma"])) {
											//Mas de un paramentro con coma.
				$result = $client->call('Sumar',array($_POST["num1"],$_POST["num2"]));
			}
			else if(isset($_POST["btnMultiplicar"]))
			{
				$result = $client->call('Multiplicar',array($_POST["num1"],$_POST["num2"]));
			}
			else
			{
				$result = $client->call('Restar',array('Resta' => array('Numero1' => $_POST["num1"],'Numero2' => $_POST["num2"])));
			}

			if ($client->fault) {
				echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
				print_r($result);
				echo '</pre>';
			} 
			else {
				$err = $client->getError();
				if ($err) {
					echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
				} 
				else {
					echo '<h2>Resultado</h2>';
					echo '<pre>' . $result . '</pre>';
				}
			}
		}
	?>
</body>
</html>