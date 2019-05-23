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
	if ($_SESSION['id_perfil'] == 1) {
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
			<div>
				<center>
					<h4>Reporte Historico por Sector</h1>
						<div class="container">
							<div class="col-md-4 login-sec">
								<div class="card bg-light">
									<article class="card-body mx-auto" style="max-width: 400px;">
										<form method="post">
											<div class="form-group input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"> <i class="fa fa-building"></i> </span>
												</div>
												<select name="sector" class="form-control"><?php echo $select1; ?></select>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-success" name="buscar" value="buscar"> Buscar Sector</button>
											</div>
										</form>
									</article>
								</div>
							</div>
						</div>
						<div>
							<?php
							//tabla
							if (isset($_POST['buscar'])) {
								$id_sector = $_POST['sector'];
								?>
								<div>
									<br>
									<h4>Estadísticas según delito del sector (ultimos 12 meses)</h4>
									<div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
									<br>
									<h4>Estadistícas cronológicas</h4>
									<div id="container1" style="min-width: 310px; height: 400px; max-width: 800px; margin: 0 auto"></div>
								</div>
								<?php
								?>
								<script type="text/javascript">
									setTimeout('char()', 2000);

									function char() {
										Highcharts.chart('container1', {
											chart: {
												type: 'spline'
											},
											title: {
												text: 'Delincuencia por sector'
											},
											subtitle: {
												text: ' '
											},
											xAxis: {
												type: 'datetime',
												dateTimeLabelFormats: { // don't display the dummy year
													month: '%e. %b',
													year: '%b'
												},
												title: {
													text: 'Fecha'
												}
											},
											yAxis: {
												title: {
													text: ''
												},
												min: 0
											},
											tooltip: {
												headerFormat: '<b>{series.name}</b><br>',
												pointFormat: '{point.x:%e. %b}: {point.y:.0f} Cantidad'
											},
											plotOptions: {
												spline: {
													marker: {
														enabled: true
													}
												}
											},
											colors: ['#6CF', '#39F', '#06C', '#036', '#000'],
											// Define the data points. All series have a dummy year
											// of 1970/71 in order to be compared on the same x axis. Note
											// that in JavaScript, months start at 0 for January, 1 for February etc.
											series: [{
												name: "SECTOR",
												data: [
													<?php
													$year = 0;
													$month = 0;
													$day = 0;
													$total = 0;
													$lista = new funciones();
													$res = $lista->sector_historico($id_sector);
													foreach ($res as $obj => $o) {
														$year = $o['year'];
														$month = $o['month'];
														$day = $o['day'];
														$total = $o['total'];
														echo "[Date.UTC(" . $year . ", " . $month . ", " . $day . ")," . $total . "],";
													}
													?>
												]
											}]
										});
									}
								</script>
								<?php
								?>
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
												$res = $lista->sector_filtro($id_sector);
												foreach ($res as $obj => $o) {
													$delincuente = $o['id_comuna'];
													$total = $o['total'];
													$delito = $o['delito'];
													$total = (int)$total;
													echo "{";
													echo "name:'Delito: " . $delito . "',";
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
							<h4>Estaidcas del Sector <?php echo $o['sector']; ?>:</h4>
							<hr>
							<div class="col-md-8 login-sec">
								<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
									<thead>
										<tr>
											<th class="th-sm">Cod. Sector</th>
											<th class="th-sm">Sector</th>
											<th class="th-sm">Comuna</th>
											<th class="th-sm">Delito</th>
											<th class="th-sm">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//============ Genera tabla ===============
										require_once '../controller/cadmin.php';
										$lista = new funciones();
										$res = $lista->sector_filtro($id_sector);
										foreach ($res as $obj => $o) {
											?>
											<tr>
												<td>SEC-000A-<?php echo $o['id_sector'] ?></td>
												<td><?php echo $o['sector'] ?></td>
												<td><?php echo $o['comuna'] ?></td>
												<td><?php echo $o['delito']; ?></td>
												<td><?php echo $o['total']; ?></td>
											</tr>
										<?php
									}
									?>
									</tbody>
									<tfoot>
										<tr>
											<th class="th-sm">Cod. Sector</th>
											<th class="th-sm">Sector</th>
											<th class="th-sm">Comuna</th>
											<th class="th-sm">Delito</th>
											<th class="th-sm">Total</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<div>
							<?php
						} ?>
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