<?php

function api($tk)
{
	//link
	$url = "http://localhost/prevcrim/view/ws/controller/acceso.php?opcion=licencia_admin&token=";
	$resultado = $url . $tk;
	return $resultado;
}

$tk = 123;
$direcion = api($tk);

$json = file_get_contents($direcion);

$datos = json_decode($json, true);

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
				</tr>
			</thead>

			<?php
			foreach ($datos as $key => $value) {
				$licencia = $value['licencia'];
				$perfil = $value['perfil'];
				?>
				<tbody>
					<tr class="table-info">
						<td><?php echo $perfil; ?></td>
						<td><?php echo $licencia; ?></td>
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
				<?php

				$licencia = $value['licencia'];
				$perfil = $value['perfil'];
				?>
				<tbody>
					<tr class="table-info">
						<td>Cantidad de consultas realizadas</td>
						<td><?php echo $licencia; ?></td>
					</tr>
					<tr class="table-info">
						<td>usuario con mas consultas</td>
						<td><?php echo $licencia; ?></td>
					</tr>
					<tr class="table-info">
						<td>Monto a pagar C.V.</td>
						<td><?php echo $licencia; ?></td>
					</tr>
				</tbody>
			</table>

			<h3>Contrato:</h3>
			<table class="table table-striped w-auto">
				<?php

				$licencia = $value['licencia'];
				$perfil = $value['perfil'];
				?>
				<tbody>
					<tr class="table-info">
						<td>Cantidad de consultas realizadas</td>
						<td><?php echo $licencia; ?></td>
					<tr class="table-info">
						<td>Plan Vigente</td>
						<td><?php echo $licencia; ?></td>
					</tr>
					<tr class="table-info">
						<td>Fecha de terino de contrato</td>
						<td><?php echo $licencia; ?></td>
					</tr>
					</tr>
				</tbody>
			</table>

	</center>
</body>

</html>