<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}
require_once 'loading.php';
require_once '../controller/cadmin.php';

$primer_nombre          = isset($_REQUEST['primer_nombre']) ? $_REQUEST['primer_nombre'] : isset($_REQUEST['primer_nombre']);

$segundo_nombre         = isset($_REQUEST['segundo_nombre']) ? $_REQUEST['segundo_nombre'] : isset($_REQUEST['segundo_nombre']);

$primer_apellido        = isset($_REQUEST['primer_apellido']) ? $_REQUEST['primer_apellido'] : isset($_REQUEST['primer_apellido']);

$segundo_apellido       = isset($_REQUEST['segundo_apellido']) ? $_REQUEST['segundo_apellido'] : isset($_REQUEST['segundo_apellido']);

$celular               = isset($_REQUEST['celular']) ? $_REQUEST['celular'] : isset($_REQUEST['celular']);

$fijo                  = isset($_REQUEST['fijo']) ? $_REQUEST['fijo'] : isset($_REQUEST['fijo']);

$rut                   = isset($_REQUEST['rut']) ? $_REQUEST['rut'] : isset($_REQUEST['rut']);

$comuna                = isset($_REQUEST['comuna']) ? $_REQUEST['comuna'] : isset($_REQUEST['comuna']);

$direccion             = isset($_REQUEST['direccion']) ? $_REQUEST['direccion'] : isset($_REQUEST['direccion']);

$nacionalidad          = isset($_REQUEST['nacionalidad']) ? $_REQUEST['nacionalidad'] : isset($_REQUEST['nacionalidad']);

$genero                = isset($_REQUEST['genero']) ? $_REQUEST['genero'] : isset($_REQUEST['genero']);

$apado                = isset($_REQUEST['apodo']) ? $_REQUEST['apodo'] : isset($_REQUEST['apodo']);

$id_estado_delincuente = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : isset($_REQUEST['estado']);

$ingresar              = isset($_REQUEST['ingresar']) ? $_REQUEST['ingresar'] : isset($_REQUEST['ingresar']);


if ($ingresar == "crear") {
    $ingresar_delincuente = new funciones();
    $registrar = $ingresar_delincuente->nuevo_delincuente(
        $primer_nombre,
        $segundo_nombre,
        $primer_apellido,
        $segundo_apellido,
        $celular,
        $fijo,
        $rut,
        $comuna,
        $nacionalidad,
        $direccion,
        $genero,
        $id_estado_delincuente,
        $ingresar,
        $apado
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Funcionario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<?php
if ($_SESSION["id_perfil"] == 3) {
    require_once('../controller/cadmin.php');
    $obj = new funciones();

    //==================LISTA DE NACIONALIDAD =============
    $lista = $obj->lista_nacionalidad();
    $select1 = '';
    foreach ($lista as $key => $value) {
        $select1 .= '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
    }

    //==================LISTA DE COMUNAS =============       
    $lista1 = $obj->lista_comuna();
    $select2 = '';
    foreach ($lista1 as $key1 => $value1) {
        $select2 .= '<option value="' . $value1["id_comuna"] . '">' . $value1["comuna"] . '</option>';
    }

    //==================LISTA DE ESTADO DEINCUENTE =============       
    $lista1 = $obj->lista_estado_delincunete();
    $select = '';
    foreach ($lista1 as $key2 => $value2) {
        $select .= '<option value="' . $value2["id"] . '">' . $value2["nombre"] . '</option>';
    }
    ?>

<body>
    <center>
        <h5>Ingresar delincuente:</h5>
        <div class="container">
            <br>
            <div class="col-md-8 login-sec">

                <form method="post">
                    <div class="container">
                        <table class="table table-striped">
                            <form class="well form-horizontal" method="post" action="op_delincunete.php">
                                <tbody>
                                    <tr>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">RUT</label>
                                            <div class="col-md-4 inputGroupContainer">
                                                <div class="input-group"><span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span><input id="rut" name="rut" required oninput="checkRut(this)"
                                                        placeholder="RUT" class="form-control" required="true"
                                                        type="text" maxlength="11"></div>
                                                <script src="js/modulo11.js"></script>
                                            </div>
                                        </div>
                                    </tr>

                                    <tr>
                                        <td colspan="1">
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Primer Nombre</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-user"></i></span><input
                                                            name="primer_nombre" placeholder="Primer Nombre"
                                                            class="form-control" required="true" type="text"
                                                            maxlength="20"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Primer Apellido</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-home"></i></span><input
                                                            name="primer_apellido" placeholder="Primer Apellido"
                                                            class="form-control" required="true" type="text"
                                                            maxlength="20"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Apodo</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-home"></i></span><input
                                                            name="apodo" placeholder="Apodo" class="form-control"
                                                            required="true" type="text" maxlength="20"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Domicilio</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-home"></i></span><input
                                                            name="direccion" placeholder="Domicilio"
                                                            class="form-control" required="true" type="text"
                                                            maxlength="20"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Comuna</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" style="max-width: 100%;"><i
                                                                class="glyphicon glyphicon-list"></i></span>
                                                        <select class="selectpicker form-control" name="comuna">
                                                            <?php echo $select2; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Nacionalidad</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" style="max-width: 100%;"><i
                                                                class="glyphicon glyphicon-list"></i></span>
                                                        <select class="selectpicker form-control" name="nacionalidad">
                                                            <?php echo $select1; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        <td colspan="1">
                                            <div class="form-group">
                                                <label class="col-md-8 control-label">Segundo Nombre</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-user"></i></span><input
                                                            name="segundo_nombre" placeholder="Segundo Nombre"
                                                            class="form-control" required="true" value="" type="text"
                                                            maxlength="20"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-8 control-label">Segundo Apellido</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-home"></i></span><input
                                                            name="segundo_apellido" placeholder="Segundo Apellido"
                                                            class="form-control" required="true" value="" type="text"
                                                            maxlength="20"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Celuar</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-home"></i></span><input
                                                            name="celular" placeholder="Celuar" class="form-control"
                                                            required="true" type="text" maxlength="9"
                                                            onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Fijo</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-home"></i></span><input
                                                            name="fijo" placeholder="Fijo" class="form-control"
                                                            required="true" type="text" maxlength="9"
                                                            onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-8 control-label">Genero</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" style="max-width: 100%;"><i
                                                                class="glyphicon glyphicon-list"></i></span>
                                                        <select class="selectpicker form-control" name="genero">
                                                            <option value="masculino">Masculino</option>
                                                            <option value="femenino">Fmenino</option>
                                                            <option valul="otros">Otros</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="col-md-8 control-label">Estado</label>
                                            <div class="col-md-12 inputGroupContainer" id="div1">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="max-width: 100%;"><i
                                                            class="glyphicon glyphicon-list" name="estado"></i></span>
                                                    <select class="selectpicker form-control" name="estado">
                                                        <?php echo $select; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <td align="center" colspan="2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" name="ingresar"
                                                value="crear">Ingresar Delincuente</button>
                                        </div>
                                    </td>

                                </tbody>
                            </form>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </center>
</body>
<?php
} else echo "debe iniciar sesión con una cuenta con previlegios";
?>

</html>