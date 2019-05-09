<! DOCTYPE html>

    <head>
        <meta name="viewport" content="initial-scale = 1.0, escalable por el usuario = no" />
        <meta http-equiv="content-type" content="text / html; charset = UTF-8 " />
        <title> Uso de MySQL y PHP con Google Maps </title>
        <style>
        </style>
    </head>
    <html>
    <body>
<?php
 
$direccion = 'Calle Serrano 154, Madrid, España';
 
// Obtener los resultados JSON de la peticion.
$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($direccion).'&sensor=false');
 
// Convertir el JSON en array.
$geo = json_decode($geo, true);
 
// Si todo esta bien
if ($geo['status'] = 'OK') {
	// Obtener los valores
	$latitud = $geo['results'][0]['geometry']['location']['lat'];
	$longitud = $geo['results'][0]['geometry']['location']['lng'];
}
 
echo "Latitud: ".$latitud." longitud: ".$longitud;
  

?>        
        
      https://developers.google.com/maps/documentation/javascript/mysql-to-maps  
    </body>

    </html>