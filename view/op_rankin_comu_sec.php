<?php
error_reporting(0);
if (!isset($_SESSION["id_perfil"])) {
	session_start();
}
require_once 'loading.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Prevcrim - Historico</title>
	<link rel="stylesheet" href="css/panel.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('#dtBasicExample').DataTable();
			$('.dataTables_length').addClass('bs-select');
		});
		$('#dtBasicExample').DataTable({
			language: {
				processing: "Cargando...",
				search: "Buscar:",
				lengthMenu: "Mostrar elementos en: _MENU_",
				info: "Elementos mostrados _START_ de _END_  de un total _TOTAL_ Elementos encontrados",
				infoEmpty: " ",
				infoFiltered: "",
				infoPostFix: "",
				loadingRecords: "Busqueda en curso...",
				zeroRecords: "No se encontro dato",
				emptyTable: " ",
				paginate: {
					first: "Premier",
					previous: "Anterior",
					next: "Siguiente",
					last: "Ultimo"
				},
				aria: {
					sortAscending: ": activer pour trier la colonne par ordre croissant",
					sortDescending: ": activer pour trier la colonne par ordre décroissant"
				}
			}
		});
	</script>
	<script type="text/javascript">
		function ExportToExcel(dtBasicExample) {
			var htmltable = document.getElementById('dtBasicExample');
			var html = htmltable.outerHTML;
			window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
		}
	</script>
	<script src="js/highcharts.js"></script>
	<script src="js/modules/exporting.js"></script>
	<script src="js/modules/export-data.js"></script>
	<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>

</head>
<?php
//valida inicio de sesion y despues perfil moestra body o no
if (isset($_SESSION['perfil'])) {
	if ($_SESSION['id_perfil'] == 3 ) {
		require_once '../controller/cadmin.php';
		$obj = new funciones();
		//==================LISTA DE comunas =============
		$lista1 = $obj->sector();
		$select1 = '';
		foreach ($lista1 as $key1 => $value1) {
			$select1 .= '<option value="' . $value1["id_sector"] . '">' . $value1["sector"] . '</option>';
		}
		?>

		<body>
			<center>
				<div>
					<br>
					<h4>Estadísticas según comuna (TOP 5)</h4>
					<div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
					<hr>
					<h4>Estadísticas según sector (TOP 5)</h4>
					<div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

					<script type="text/javascript">
						Highcharts.chart('container2', {
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: true,
								type: 'pie'
							},
							title: {
								text: ' '
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									dataLabels: {
										enabled: true,
										format: '<b>{point.name}</b>: {point.percentage:.1f} %',
										style: {
											color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
										}
									}
								}
							},
							series: [{
								name: 'Catidad',
								colorByPoint: true,
								data: [
									<?php
									//traemos los datos
									$lista = new funciones();
									$res = $lista->rankinkComuna();
									foreach ($res as $obj => $o) {
										$delincuente = $o['id_comuna'];
										$total = $o['total_comuna'];
										$delito = $o['comuna'];
										$total = (int)$total;
										echo "{";
										echo "name:'" . $delito . "',";
										echo "y:" . $total . ",";
										echo "sliced: false,";
										echo "elected: true";
										echo "},";
									}
									?>
								]
							}]
						});
					</script>
					<script type="text/javascript">
						Highcharts.chart('container1', {
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: true,
								type: 'pie'
							},
							title: {
								text: ' '
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									dataLabels: {
										enabled: true,
										format: '<b>{point.name}</b>: {point.percentage:.1f} %',
										style: {
											color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
										}
									}
								}
							},
							series: [{
								name: 'Catidad',
								colorByPoint: true,
								data: [
									<?php
									//traemos los datos
									$lista = new funciones();
									$res = $lista->rankinkSector();
									foreach ($res as $obj => $o) {
										$delincuente = $o['id_comuna'];
										$total = $o['total_sector'];
										$delito = $o['sector'];
										$total = (int)$total;
										echo "{";
										echo "name:'" . $delito . "',";
										echo "y:" . $total . ",";
										echo "sliced: false,";
										echo "elected: true";
										echo "},";
									}
									?>
								]
							}]
						});
					</script>
				</div>
				<br>
			</center>
			</div>
		</body>
	<?php
} else {
	echo "debe iniciar sesión con un perfil autorizado";
}
} else {
	echo "debe iniciar sesión";
}
?>

</html>