<?php
//error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}

require_once 'loading.php';
require_once '../controller/cadmin.php';

$sector   = isset($_REQUEST['sector']) ? $_REQUEST['sector'] : isset($_REQUEST['sector']);

$comuna   = isset($_REQUEST['comuna']) ? $_REQUEST['comuna'] : isset($_REQUEST['comuna']);

$ingresar  = isset($_REQUEST['ingresar']) ? $_REQUEST['ingresar'] : isset($_REQUEST['ingresar']);

    if ($ingresar == "agregar") {

    $agregarC = new funciones();
    $ag=$agregarC->agregarComuna($sector, $comuna);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Sector</title>
    <link rel="stylesheet" href="css/panel.css">
    <!-- Script alerta modificado -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php
if ($_SESSION["id_perfil"] == 1) {
    ?>

    <body>
        <br>
        <center>
            <h4>Agregar Comuna a sector</h4>
            <div class="container">
                <br>
                <div class="col-md-6 login-sec"><div>
                <form method="post">
                    <?php 
                    //==================Lista de sectores =============     
                    $obj = new funciones();
                    $lista = $obj-> listaSectores();
                    $select = '';
                    foreach ($lista as $key => $value) {
                        $select .= '<option value="' . $value["id_sector"] . '">' . $value["sector"] . '</option>';
                    }
        
                 ?>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building">Sector</i> </span>
                        </div >
                        <select name="sector" class="form-control"><?php echo $select; ?></select>
                    </div>

                    <?php 
                    //==================LISTA de comunas =============     
                    $obj = new funciones();
                    $lista = $obj-> lista_comuna();
                    $select1 = '';
                    foreach ($lista as $key => $value) {
                        $select1 .= '<option value="' . $value["id_comuna"] . '">' . $value["comuna"] . ", ".$value["region"] .'</option>';
                    }
                 ?>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building">Comuna</i> </span>
                        </div >
                        <select name="comuna" class="form-control"><?php echo $select1; ?></select>
                    </div>
                    <div class="form-group">
                                <button type="submit" class="btn btn-success" name="ingresar" value="agregar">Agrear Comuna</button>
                    </div>

                </form>
            </div>
        </center>
    </body>
<?php
} else {
    echo "debe iniciar sesión";
    echo "<meta http-equiv='refresh' content='0;url=../index.html'>";
}
?>


</html