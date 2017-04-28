<?php 

	public TraerTabla()
	{
		$conexion = new PDO("mysql:host=localhost;dbname=productos","root","");

		$statement = $conexion->prepare("SELECT nombre AS name,codigo_barra AS codigo, path_foto AS pathh FROM producto WHERE 1");


		$statement->bindColumn(1,$codigo);
		$statement->bindColumn(2,$name);
		$statement->bindColumn(3,$pathh);

		$statement->execute();

		echo "<table class='table'>
				<thead>
					<tr>
						<th>  COD. BARRA </th>
						<th>  NOMBRE     </th>
						<th>  FOTO       </th>
					</tr> 
				</thead>";   	

		while($statement->fetch(PDO::FETCH_BOUND))
		{
			
					echo " 	<tr>
							<td>".$codigo."</td>
							<td>".$name."</td>
							<td><img src='archivos/".$pathh."' width='100px' height='100px'/></td>
						</tr>";
		}

		echo "</table>";


	}		
/*
	public EliminarXCodigo($aidi)
	{

	}
*/
?>