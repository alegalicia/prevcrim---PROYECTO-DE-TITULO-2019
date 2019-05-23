<?php
error_reporting(0);
require_once 'loading.php';
require_once '../controller/cadmin.php';
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

$institucion   = isset($_REQUEST['institucion']) ? $_REQUEST['institucion'] : isset($_REQUEST['institucion']);

$perfil   = isset($_REQUEST['perfil']) ? $_REQUEST['perfil'] : isset($_REQUEST['perfil']);

$clave   = isset($_REQUEST['clave']) ? $_REQUEST['clave'] : isset($_REQUEST['clave']);

$clave1  = isset($_REQUEST['clave1']) ? $_REQUEST['clave1'] : isset($_REQUEST['clave1']);

$direccion  = isset($_REQUEST['direccion']) ? $_REQUEST['direccion'] : isset($_REQUEST['direccion']);

$ingresar  = isset($_REQUEST['ingresar']) ? $_REQUEST['ingresar'] : isset($_REQUEST['ingresar']);

if ($ingresar == "actualizar") {
    if ($clave == $clave1) {
        if ($comuna != 0) {
            if ($institucion != 0) {
                if ($perfil != 0) {

                    $act = new funciones();
                    $registrar = $act->actualizar_usuario(
                        $primer_nombre,
                        $segundo_nombre,
                        $primer_apellido,
                        $segundo_apellido,
                        $correo,
                        $celular,
                        $fijo,
                        $rut,
                        $comuna,
                        $institucion,
                        $perfil,
                        $clave,
                        $direccion
                    );
                } else echo "<script>alert('SELECIONE UNA PERFIL');</script>";
            } else echo "<script>alert('SELECIONE UNA INSTITUCION');</script>";
        } else echo "<script>alert('SELECIONE UN COMUNA');</script>";
    } else echo "<script>alert('LAS CONTRASEÑAS NO COINCIDEN');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>usuairo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                loadingRecords: "Chargement en cours...",
                zeroRecords: "No se encontro factura",
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
</head>
<?php
if ($_SESSION["id_perfil"] == 1) {
    ?>
    <body>
        <center>
            <br>
            <h4> Actualizar Usuario: </h4>
            <div class="col-md-8 login-sec">
                <form class="login-form" action="admin_act.php" method="post" name="f1">
                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="th-sm">Editar</th>
                                <th class="th-sm">Rut</th>
                                <th class="th-sm">Nombre </th>
                                <th class="th-sm">Apellido</th>
                                <th class="th-sm">Institución</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //============ Genera tabla ===============
                            require_once('../controller/cadmin.php');
                            $lista = new funciones();
                            $res = $lista->lista_usuario();
                            foreach ($res as $obj => $o) {
                                $fac = $o['rut'];
                                ?>
                                <tr>
                                    <td align='center'><input type='radio' value="<?php echo $o['rut'] ?>" id='ckhActualizar' name='update' /></td>
                                    <td><?php echo $o['rut'] ?></td>
                                    <td><?php echo $o['primer_nombre'] ?></td>
                                    <td><?php echo $o['primer_apellido'] ?></td>
                                    <td><?php echo $o['institucion'] ?></td>
                                </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Editar</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Institución</th>
                            </tr>
                        </tfoot>
                    </table>
                    <button class="btn btn-success" name="editar" type="submit" value="editar">Seleccionar</button>
                </form>
            </div>
            <br>
            <div class="col-md-4 login-sec">
                <?php
                if (isset($_POST['update'])) {
                    $id = $_POST['update'];
                    //============ Genera tabla ===============
                    require_once('../controller/cadmin.php');
                    $lista = new funciones();
                    $res = $lista->buscar_usuario($id);
                    foreach ($res as $obj => $o) {
                        $fac = $o['rut'];
                        $obj = new funciones();
                        //==================LISTA DE instituciones=============
                        $lista = $obj->lista_inst();
                        $select = '<option value="">Instituciones</option>';
                        foreach ($lista as $key2 => $value) {
                            $select .= '<option value="' . $value["id_institucion"] . '">' . $value["institucion"] . '</option>';
                        }
                        //==================LISTA DE comunas =============       

                        $lista1 = $obj->lista_comuna();
                        $select1 = '<option value="">Comuna</option>';
                        foreach ($lista1 as $key1 => $value1) {
                            $select1 .= '<option value="' . $value1["id_comuna"] . '">' . $value1["comuna"] . '</option>';
                        }
                        //==================LISTA DE perfiles =============        
                        $lista2 = $obj->lista_perfil();
                        $select2 = '<option value="">Perfil</option>';
                        foreach ($lista2 as $key2 => $value2) {
                            $select2 .= '<option value="' . $value2["id_perfil"] . '">' . $value2["perfil"] . '</option>';
                        }
                        ?>
                        <hr>
                        <div class="card bg-light">
                            <article class="card-body mx-auto" style="max-width: 400px;">
                                <form action="admin_act.php" method="get">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <style>
                                                #rut {
                                                    text-align: center;
                                                    color: red;
                                                }
                                            </style>

                                            <input id="rut" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" name="rut" class="form-control" placeholder=Rut type="text" required maxlength="10" value="<?php echo $o['rut']; ?>" readonly="readonly">
                                        </div>
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input name="primer_nombre" class="form-control" placeholder="Primer Nombre" type="text" required maxlength="20" value="<?php echo $o['primer_nombre'] ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input name="segundo_nombre" class="form-control" placeholder="Segundo Nombre" type="text" required maxlength="30" value="<?php echo $o['segundo_nombre'] ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input name="primer_apellido" class="form-control" placeholder="Apellido Parteno" type="text" required maxlength="30" value="<?php echo $o['primer_apellido'] ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input name="segundo_apellido" class="form-control" placeholder="Apellido Materno" type="text" required maxlength="30" value="<?php echo $o['segundo_apellido'] ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input name="correo" class="form-control" placeholder="Correo electronico" type="email" required maxlength="50" value="<?php echo $o['correo'] ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                        </div>
                                        <select class="custom-select" style="max-width: 120px;" required maxlength="3">
                                            <option value="+56">+56</option>
                                        </select>
                                        <input name="celular" class="form-control" placeholder="Celular" type="text" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required maxlength="9" value="<?php echo $o['celular'] ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                        </div>
                                        <select class="custom-select" style="max-width: 120px;">
                                            <option svalue="+56">+56</option>
                                        </select>
                                        <input name="fijo" class="form-control" placeholder="Fijo" type="text" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required maxlength="9" value="<?php echo $o['fijo'] ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input name="direccion" class="form-control" placeholder="Diección" type="text" required maxlength="30" value="<?php echo $o['direccion'] ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                        </div>
                                        <select name="comuna" class="form-control"><?php echo $select1; ?></select>
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                        </div>
                                        <select name="institucion" class="form-control"><?php echo $select; ?></select>
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                        </div>
                                        <select name="perfil" class="form-control"><?php echo $select2; ?></select>
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

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="ingresar" value="actualizar"> Actualizar cuenta</button>
                                    </div>
                                </form>
                            </article>
                        </div>
                        <hr>
                    <?php
                }
            } ?>
            </div>
        </center>
    </body>
<?php
} else echo "debe iniciar sesión con una cuenta con previlegios";
?>
</html>