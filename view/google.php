<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}

require_once 'loading.php';
require_once '../controller/cadmin.php';

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Map prevcrim</title>
  <style>
    
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
      height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
      align-items: center;
    }
  </style>
</head>

<body>
  <center>
  <h4>UBICACION ACTUAL DE LOS DELINCUENTE</h4>
  </center>

  <div id="map"></div>
  <script>
    function initMap() {

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {
          lat: -33.4845875,
          lng: -70.6227194
        }
      });

      // Create an array of alphabetical characters used to label the markers.
      var labels = 'Delincunte';
      var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
      // Add some markers to the map.
      // Note: The code uses the JavaScript Array.prototype.map() method to
      // create an array of markers based on a given "locations" array.
      // The map() method here has nothing to do with the Google Maps API.
      var markers = locations.map(function(location, i) {
        return new google.maps.Marker({
          <?php
          require_once('../controller/cadmin.php');
          $lista = new funciones();
          $res = $lista->geolocalizacion_delito();
          foreach ($res as $obj => $o) {

            $direccion = $o['direccion'];
            $apodo = $o['apodo'];
          }
          ?>
         
          title: "Apodo: <?php echo  $apodo;?>",
          position: location,
          icon: image,
          label: labels
        });
      });
      // Add a marker clusterer to manage the markers.
      var markerCluster = new MarkerClusterer(map, markers, {
        imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
      });
    }
    var locations = [
      <?php

      require_once('../controller/cadmin.php');
      $lista = new funciones();
      $res = $lista->g();
      foreach ($res as $obj => $o) {
        $s = $o['clave'];
      }

      require_once('../controller/cadmin.php');
      $lista = new funciones();
      $res = $lista->geolocalizacion_delito();
      $contador=0;
      foreach ($res as $obj => $o) {

        $direccion = $o['direccion'];
        $comuna = $o['comuna'];
        $latitud = $o['latitud'];
        $longitud = $o['longitud'];
        $contador++;
        echo "{lat: " . $latitud . ", lng: " . $longitud . "},";
      }

      ?>
    ]
  </script>
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvHRtuYZISLE1P9gOa8Edu8KM37ZufM3U&callback=initMap">
  </script>
  <?php

  if (!isset($_SESSION["login"])) {
    session_start();
}
      $contador;
      require_once '../controller/cadmin.php';
      $act = new funciones();
      $registrar = $act->cuentaGoogle( $contador);

  ?>
</body>

</html>