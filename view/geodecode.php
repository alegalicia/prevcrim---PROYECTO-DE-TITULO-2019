<?php
 //============ Genera algo ===============
 require_once('../controller/cadmin.php');
 $lista = new funciones();
 $res = $lista->g();
 foreach ($res as $obj => $o) {
 $s = $o['clave'];
 }

 $lista = new funciones();
 $res = $lista->geolocalizacion_delito();
 foreach ($res as $obj => $o) {

$direccion = $o['direccion'];
$comuna = $o['comuna']; 


$direccion = $direccion . ", ".$comuna.", CHILE";
// Obtener los resultados JSON de la peticion.
$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($direccion).'&key='.$s.'');

// Convertir el JSON en array.
$geo = json_decode($geo, true);
 
// Si todo esta bien
if ($geo['status'] = 'OK') {
	// Obtener los valores
	$latitud = $geo['results'][0]['geometry']['location']['lat'];
	
	$longitud = $geo['results'][0]['geometry']['location']['lng'];
	echo '<br>';
}
echo "Latitud: ".$latitud." longitud: ".$longitud;
 }

?>