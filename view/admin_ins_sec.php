
<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}

require_once 'loading.php';
require_once '../controller/cadmin.php';

$institucion   = isset($_REQUEST['monitor']) ? $_REQUEST['monitor'] : isset($_REQUEST['monitor']);

$sector   = isset($_REQUEST['sector']) ? $_REQUEST['sector'] : isset($_REQUEST['sector']);

$ingresar  = isset($_REQUEST['ingresar']) ? $_REQUEST['ingresar'] : isset($_REQUEST['ingresar']);

if ($ingresar == "crear") {
    $ingresar_act = new funciones();
    $registrar = $ingresar_act->ingresar_ins_sec($institucion, $sector);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Funcionario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    
</head>
<?php
if ($_SESSION["id_perfil"] == 1) {

    require_once('../controller/cadmin.php');
    $obj = new funciones();

    //==================LISTA DE instituciones=============
    $lista = $obj->lista_sectores();
    $select = '';
    foreach ($lista as $key2 => $value) {
        $select .= '<option value="' . $value["id_sector"] . '">' . $value["sector"] . '</option>';
    }


    $lista1 = $obj->lista_inst();
    $select1 = '';
    foreach ($lista1 as $key2 => $value1) {
        $select1 .= '<option value="' . $value1["id_institucion"] . '">' . $value1["institucion"] . '</option>';
    }

    ?>
    <body>
        <center>
            <h4>Nueva institución</h4>
            <div class="container">
                <br>
                <div class="col-md-4 login-sec">
                    <div class="card bg-light">
                        <article class="card-body mx-auto" style="max-width: 400px;">

                            <form method="post">

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <select name="monitor" class="form-control"><?php echo $select1; ?></select>
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <select name="sector" class="form-control"><?php echo $select; ?></select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block" name="ingresar" value="crear"> Crear institución</button>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </center>
    </body>
<?php
} else {
    echo "<script>alert('DEBE INICIAR SESIÓN..!!!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.html'>";
}
?>

</html>