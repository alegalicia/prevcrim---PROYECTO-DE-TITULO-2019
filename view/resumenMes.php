<?php
error_reporting(0);
require_once 'loading.php';
if (!isset($_SESSION["login"])) {
    session_start();
}
//consumo api licencias
function apiLicencias($tk)
{
	//link
	$url = "https://prevcrim.000webhostapp.com/view/ws/controller/acceso.php?opcion=licencia&token=";
	$resultado = $url . $tk;
	return $resultado;
}

$tk = 123;
$direcion = apiLicencias($tk);
$json = file_get_contents($direcion);
$datos = json_decode($json, true);

//consumo api consultas google map
function apiGoogle($tk1)
{
	//link
	$url = "https://prevcrim.000webhostapp.com/view/ws/controller/acceso.php?opcion=controlGoogle&token=";
	$resultado = $url . $tk1;
	return $resultado;
}

$tk1 = 123;
$direcion1 = apiGoogle($tk1);
$json1 = file_get_contents($direcion1);
$datos2 = json_decode($json1, true);


//consumo api consultas google map
function contrato($t)
{
	//link
	$url = "https://prevcrim.000webhostapp.com/view/ws/controller/acceso.php?opcion=contrato&token=";
	$resultado = $url . $t;
	return $resultado;
}

$t = 123;
$contra = contrato($t);
$json2 = file_get_contents($contra);
$datos3 = json_decode($json2, true);


/*
$json_errors = array (
	JSON_ERROR_NONE => 'No se ha producido ningún error',
	JSON_ERROR_DEPTH => 'La profundidad máxima de la stack ha sido excedida',
	JSON_ERROR_CTRL_CHAR => 'Error de carácter de control, posiblemente codificado incorrectamente',
	JSON_ERROR_SYNTAX => 'Error de syntax',
);
echo 'Último error:', $json_errors [json_last_error ()], PHP_EOL, PHP_EOL;
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Control Licencias</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/panel.css">
</head>

<body>
	<center <div id="licencias">
		<h2>Facturación: </h2>

		<h3>Control Licencias</h3>

		<table class="table table-striped w-auto">
			<thead>
				<tr>
					<th>Perfil</th>
					<th>Licencia</th>
					<th>Disponibles</th>
				</tr>
			</thead>

			<?php
			$op = 3000;
			$jz = 10;
			$admin = 1;

			foreach ($datos as $key => $value) {
				$licencia = $value['licencia'];
				$perfil = $value['perfil'];
				$t = 0;
				?>
				<tbody>
					<tr class="table-info">
						<td><?php echo $perfil; ?></td>
						<td><?php echo $licencia; ?></td>
						<td><?php

							if ($perfil == "Administrador General") {
								$t = $admin - (int)$licencia;
								echo  $t;
								if ($t <= 0) {
									echo " Sin licencias: contacar a ventas@solobinary.cl";
								}
							}

							if ($perfil == "Jefe de Zona") {
								$t =   $jz - (int)$licencia;
								echo  $t;
								if ($t <= 0) {
									echo " Sin licencias: contacar a ventas@solobinary.cl";
								}
							}

							if ($perfil == "Operador") {
								$t =  $op - (int)$licencia;
								echo  $t;
								if ($t <= 0) {
									echo " Sin licencias: contacar a ventas@solobinary.cl";
								}
							}

							?></td>
					<?php
				}
				?>

				</tr>
			</tbody>
		</table>
		</div>
		<div id="google maps">

			<h3>Consumo Map</h3>
			<table class="table table-striped w-auto">

				<tbody>
					<tr >

						<td>Cantidad de consultas realizadas</td>
						<?php
						$actual = date("m");
						foreach ($datos2 as $key => $value) {
							$licencia1 = $value['consultas'];
							$perfil1 = $value['mes'];
							?>

							<td><?php
								if ($actual == $perfil1) {
									echo $licencia1;
									$subMes = $licencia1;
								}
							}
								?></td>
	
					</tr>

					<tr class="table-info">
						<td>Monto a pagar C.V. ($$US)</td>

						<td><?php echo
								$monto = $subMes * 0.0004;
								 $monto ?>
						</td>
					</tr>

				</tbody>
			</table>

			<h3>Contrato:</h3>
			<table class="table table-striped w-auto">

				<tbody>
				<?php
				$actual = date("m");
				foreach ($datos3 as $key => $value) {
				$licencia = $value['licencia'];
				$cliente = $value['cliente'];
				$fecha_inicio = $value['fecha_inicio'];
				$fecha_fin = $value['fecha_fin'];
				?>
					<tr class="table-info">
						<td>Cliente: </td>
						<td><?php echo $cliente; ?></td>
					<tr class="table-info">
						<td>Tipo de Licencia:</td>
						<td><?php echo $licencia; ?></td>
					</tr>
					<tr class="table-info">
						<td>Fecha de inicio de contrato</td>
						<td><?php echo $fecha_inicio; ?></td>
					</tr>

					<tr class="table-info">
						<td>Fecha de terino de contrato</td>
						<td><?php echo $fecha_fin; ?></td>
					</tr>

				  </tr>
				<?php
				}
				?>
				</tbody>
			</table>

	</center>
</body>

</html>