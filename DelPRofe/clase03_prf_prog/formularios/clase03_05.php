<?php
	$metodo = "post";
	$metodo = "get";
?>
<!doctype html>
<html>
	<head>
		<title>Aplicaci&oacute;n con Formulario - Opciones</title>

		<meta charset="UTF-8">
			
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
		<div class="container">
						
			<div class="CajaInicio animated bounceInRight">
				
				<form name="frm" action="preferencias.php" method="<?php echo $metodo; ?>" >
					<table align="center" >
						<tr>
								<td colspan="2"><h4>Elija lenguajes de Programaci&oacute;n:</h4></td>
						</tr>
						<tr>
								<td colspan="2"><hr /></td>
						</tr>
						<tr>
							<td>C:</td>
							
							<td  style="text-align:left;padding-left:15px">
								<input type="checkbox" name="chkC" value="C" />						
							</td>
						</tr>
						<tr>
							<td>C#:</td>
							
							<td  style="text-align:left;padding-left:15px">
								<input type="checkbox" name="chkCS" value="C Sharp" />						
							</td>
						</tr>
						<tr>
							<td>C++:</td>
							
							<td  style="text-align:left;padding-left:15px">
								<input type="checkbox" name="chkC++" value="C++" />						
							</td>
						</tr>
						<tr>
							<td>Java:</td>
							
							<td  style="text-align:left;padding-left:15px">
								<input type="checkbox" name="chkJava" value="Java" />						
							</td>
						</tr>
						<tr>
							<td>Visual Basic.Net:</td>
							
							<td  style="text-align:left;padding-left:15px">
								<input type="checkbox" name="chkVB" value="VBNet" />						
							</td>
						</tr>
						<tr>
								<td colspan="2"><hr /></td>
						</tr>

						<tr>
								<td colspan="2"><h4>Elija turno:</h4></td>
						</tr>
						<tr>
							<td>Ma&ntilde;ana:</td>
							
							<td  style="text-align:left;padding-left:15px">
								<input type="radio" name="rdoTurno" value="Ma&ntilde;ana" checked="checked" />						
							</td>
						</tr>
						<tr>
							<td>Tarde:</td>
							
							<td  style="text-align:left;padding-left:15px">
								<input type="radio" name="rdoTurno" value="Tarde" />						
							</td>
						</tr>
						<tr>
							<td>Noche:</td>
							
							<td  style="text-align:left;padding-left:15px">
								<input type="radio" name="rdoTurno" value="Noche" />						
							</td>
						</tr>
						
						<tr>
								<td colspan="2"><hr /></td>
						</tr>
						
						<tr>
								<td colspan="2"><h4>Elija Sede:</h4></td>
						</tr>
						<tr>
							<td>Seleccione:</td>
							
							<td style="text-align:left;padding-left:15px">
								<select id="cboSede" name="cboSede">
									<optgroup label="GBA">
									<option >Avellaneda</option>
									<option value="D" >Dom&iacute;nico</option>
									</optgroup>
									<optgroup label="CABA">
									<option value="1">Buenos Aires</option>
									<option value="2" >Medrano</option>
									</optgroup>
								</select>					
							</td>
						</tr>

						<tr>
								<td colspan="2"><hr /></td>
						</tr>
						<tr>
								<td>Comentarios:</td>
								<td style="padding-right:15px">
									<textarea rows="5" col="20" name="comentarios">
									</textarea>
								</td>
						</tr>

						<tr>
								<td colspan="2"><hr /></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="reset" value="Limpiar" class="MiBotonUTN"/>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="submit" id="btnEnviar" value="Enviar" class="MiBotonUTN"/>
							</td>
						</tr>

					</table>
					<span>Elemento oculto dentro del tag form</span>
					<input type="hidden" name="txtOculto" value="ValorOculto" />						

				</form>
				
			</div>			
		</div>
	</body>
</html>