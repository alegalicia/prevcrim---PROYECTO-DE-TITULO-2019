<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}

require_once 'loading.php';
require_once '../controller/cadmin.php';

$primer_nombre   = isset($_REQUEST['primer_nombre']) ? $_REQUEST['primer_nombre'] : isset($_REQUEST['primer_nombre']);

$segundo_nombre   = isset($_REQUEST['segundo_nombre']) ? $_REQUEST['segundo_nombre'] : isset($_REQUEST['segundo_nombre']);

$primer_apellido   = isset($_REQUEST['primer_apellido']) ? $_REQUEST['primer_apellido'] : isset($_REQUEST['primer_apellido']);

$segundo_apellido   = isset($_REQUEST['segundo_apellido']) ? $_REQUEST['segundo_apellido'] : isset($_REQUEST['segundo_apellido']);

$correo   = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : isset($_REQUEST['correo']);

$celular   = isset($_REQUEST['celular']) ? $_REQUEST['celular'] : isset($_REQUEST['celular']);

$fijo   = isset($_REQUEST['fijo']) ? $_REQUEST['fijo'] : isset($_REQUEST['fijo']);

$rut   = isset($_REQUEST['rut']) ? $_REQUEST['rut'] : isset($_REQUEST['rut']);

$comuna   = isset($_REQUEST['comuna']) ? $_REQUEST['comuna'] : isset($_REQUEST['comuna']);

$institucion   = isset($_REQUEST['id_institucion']) ? $_REQUEST['id_institucion'] : isset($_REQUEST['id_institucion']);

$perfil   = isset($_REQUEST['perfil']) ? $_REQUEST['perfil'] : isset($_REQUEST['perfil']);

$clave   = isset($_REQUEST['clave']) ? $_REQUEST['clave'] : isset($_REQUEST['clave']);

$clave1  = isset($_REQUEST['clave1']) ? $_REQUEST['clave1'] : isset($_REQUEST['clave1']);

$direccion  = isset($_REQUEST['direccion']) ? $_REQUEST['direccion'] : isset($_REQUEST['direccion']);

$ingresar  = isset($_REQUEST['ingresar']) ? $_REQUEST['ingresar'] : isset($_REQUEST['ingresar']);

if ($clave == $clave1) {

    if ($ingresar == "crear") {
        $ingresar_act = new funciones();

        $registrar = $ingresar_act->ingresar_usuario(
            $primer_nombre,
            $segundo_nombre,
            $primer_apellido,
            $segundo_apellido,
            $correo,
            $celular,
            $fijo,
            $comuna,
            $institucion,
            $perfil,
            $clave,
            $direccion,
            $rut
        );
    }
} else echo "<script>alert('LAS CONTRASEÑAS NO COINCIDEN');</script>";
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
    <style>
        p {
            color: red;
        }
    </style>
</head>
<?php
if ($_SESSION["id_perfil"] == 1) {
    require_once('../controller/cadmin.php');
    $obj = new funciones();
    $institucion = $_SESSION["id_institucion"];

    //==================LISTA DE comunas =============             
    $lista1 = $obj->lista_comuna();
    $select1 = '<option value="">Comuna</option>';
    foreach ($lista1 as $key1 => $value1) {
        $select1 .= '<option value="' . $value1["id_comuna"] . '">' . $value1["comuna"] . '</option>';
    }
    ?>

    <body>
        <center>
            <h3>Nuevo usuairo <p>(Solo puede crear Operarios de su misma Insitutción)</p>
            </h3>
            <div class="container">
                <br>
                <div class="col-md-6 login-sec">
                    <div class="card bg-light">
                        <article class="card-body mx-auto" style="max-width: 700px;">

                            <form method="post">
                                <table>
                                    <td>


                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                    <input onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" 
                                        id="rut" name="rut" required oninput="checkRut(this)" class="form-control" 
                                        placeholder=Rut type="text" required maxlength="10" >
                                        <script src="js/modulo11.js"></script>
                                    </div>
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="primer_nombre" class="form-control" placeholder="Primer Nombre" type="text" required maxlength="20">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="segundo_nombre" class="form-control" placeholder="Segundo Nombre" type="text" required maxlength="30">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="primer_apellido" class="form-control" placeholder="Apellido Parteno" type="text" required maxlength="30">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="segundo_apellido" class="form-control" placeholder="Apellido Materno" type="text" required maxlength="30">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                                    <input name="correo" class="form-control" placeholder="Correo electronico" type="email" required maxlength="50">
                                </div>
                                </td>
                                <td></td>
                                <td>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <select class="custom-select" style="max-width: 120px;" required maxlength="3">
                                        <option value="+56">+56</option>
                                    </select>
                                    <input name="celular" class="form-control" placeholder="Celular" type="text" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required maxlength="9">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <select class="custom-select" style="max-width: 120px;">
                                        <option svalue="+56">+56</option>
                                    </select>
                                    <input name="fijo" class="form-control" placeholder="Fijo" type="text" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required maxlength="9">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="direccion" class="form-control" placeholder="Dirección" type="text" required maxlength="30">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <select name="comuna" class="form-control"><?php echo $select1; ?></select>
                                </div>

                                <div>
                                    <input type="hidden" name="id_institucion" value="<?php echo $institucion; ?>">
                                </div>

                                <div>
                                    <input type="hidden" name="perfil" value="3">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input name="clave" class="form-control" placeholder="Crear contraseña" type="password" required maxlength="15">
                                </div>


                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input name="clave1" class="form-control" placeholder="Repita Contraseña" type="password" required maxlength="15">
                                </div>
                                </td>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" name="ingresar" value="crear">Crear cuenta</button>
                                </div>
                                
                                </table>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </center>
    </body>
<?php
} else echo "debe iniciar sesión con una cuenta con previlegios";
?>

</html>