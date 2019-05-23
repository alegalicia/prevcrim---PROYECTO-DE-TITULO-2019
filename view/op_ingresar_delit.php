<?php
error_reporting(0);

if (!isset($_SESSION["login"])) {
    session_start();
}
require_once 'loading.php';
require_once '../controller/cadmin.php';

$rut    = isset($_REQUEST['rut']) ? $_REQUEST['rut'] : isset($_REQUEST['rut']);

$comuna    = isset($_REQUEST['comuna']) ? $_REQUEST['comuna'] : isset($_REQUEST['comuna']);

$delito    = isset($_REQUEST['delito']) ? $_REQUEST['delito'] : isset($_REQUEST['delito']);

$direccion = isset($_REQUEST['direccion']) ? $_REQUEST['direccion'] : isset($_REQUEST['direccion']);

$fecha     = isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : isset($_REQUEST['fecha']);

$hora      = isset($_REQUEST['hora']) ? $_REQUEST['hora'] : isset($_REQUEST['hora']);

$descpcion = isset($_REQUEST['descpcion']) ? $_REQUEST['descpcion'] : isset($_REQUEST['descpcion']);

$tipo = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : isset($_REQUEST['tipo']);

$ingresar  = isset($_REQUEST['ingresar']) ? $_REQUEST['ingresar'] : isset($_REQUEST['ingresar']);


if ($ingresar == "ok") {
    $rut = (int)$rut;
    $act = new funciones();
    $registrar = $act->nuevo_delito_delincuente($rut, $comuna, $direccion, $fecha, $hora, $descpcion, $delito, $tipo);
    echo "<meta http-equiv='refresh' content='0;url=../view/op_ingresar_delito.php'>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>usuairo</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-   ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<?php
if ($_SESSION["id_perfil"] == 3) {
    ?>

    <body>
        <center>
            <br>
            <h4> Seleccionar Delincuente: </h4>
            <div class="col-md-8 login-sec">
                <form class="login-form" action="op_ingresar_delito.php" method="post" name="f1">
                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="th-sm">Delito</th>
                                <th class="th-sm">Rut</th>
                                <th class="th-sm">Nombre </th>
                                <th class="th-sm">Apellido</th>
                                <th class="th-sm">Estado</th>
                                <th class="th-sm">Comuna</th>
                                <th class="th-sm">Provincia</th>
                                <th class="th-sm">Region</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //============ Genera tabla ===============
                            require_once('../controller/cadmin.php');
                            $lista = new funciones();
                            $res = $lista->lista_delincuente();
                            foreach ($res as $obj => $o) {
                                $fac = $o['rut'];
                                ?>
                                <tr>
                                    <td align='center'>

                                        <input type='radio' value="
                                        <?php
                                        echo $o['rut'] ?>" id='ckhActualizar' name="rut" />
                                        <button type="submit" class="btn btn-success" name="modal" value="modal" data-toggle="modal" data-target="#exampleModal"><i class='far fa-angry' style='font-size:24px'></i></button>

                                    </td>
                                    <td><?php echo $o['rut'] ?></td>
                                    <td><?php echo $o['primer_nombre'] ?></td>
                                    <td><?php echo $o['primer_apellido'] ?></td>
                                    <td><?php echo $o['estado_delincuente'] ?></td>
                                    <td><?php echo $o['comuna'] ?></td>
                                    <td><?php echo $o['provincia'] ?></td>
                                    <td><?php echo $o['region'] ?></td>
                                </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Delito</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Estado</th>
                                <th>Comuna</th>
                                <th>Provincia</th>
                                <th>Region</th>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
            <br>
            <?php
            //==================LISTA DE comunas =============       
            require_once '../controller/cadmin.php';
            $obj = new funciones();
            $lista1 = $obj->lista_comuna();
            $select1 = '';
            foreach ($lista1 as $key1 => $value1) {
                $select1 .= '<option value="' . $value1["id_comuna"] . '">' . $value1["comuna"] . '</option>';
            }

            //==================LISTA DE perfiles =============        
            $lista2 = $obj->lista_delitos();
            $select2 = '';
            foreach ($lista2 as $key2 => $value2) {
                $select2 .= '<option value="' . $value2["id_delito"] . '">' . $value2["delito"] . '</option>';
            }
            ?>
            <form class="login-form" action="op_ingresar_delito.php" method="post" name="f2">
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <strong>
                                    <style>
                                        #j5,
                                        #d1 {
                                            color: red;
                                        }
                                    </style>
                                    <div>
                                        <h4 class="modal-title" id="j5">DELITO/CONTROL</h4>
                                    </div>
                                </strong>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="d1">
                                    <?php
                                    $rut = "";
                                    $rut = $_POST['rut'];

                                    echo "RUT Delincuente: " . $rut ?>
                                    <input name="rut" type="hidden" value="<?php echo $rut; ?>">
                                </div>
                                <hr>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <select name="tipo" class="form-control">
                                        <option value="control">Control</option>
                                        <option value="Delito">Delito</option>
                                    </select>
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
                                    <select name="delito" class="form-control"><?php echo $select2; ?></select>
                                </div>

                                <table>
                                    <tr>
                                        <td>
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                </div>
                                                <input name="fecha" class="form-control" type="date" required>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                </div>
                                                <input name="hora" class="form-control" type="time" required>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="md-form">
                                    <label for="form7">Descripción de lo sucedido</label>
                                    <textarea id="form7" class="md-textarea form-control" rows="3" name="descpcion"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                <button type="submit" class="btn btn-success" name="ingresar" value="ok">Guardar Delito</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </center>
        <?php
        if (isset($_POST['rut'])) {
            ?>
            <script>
                $(document).ready(function() {
                    $('#myModal').modal('toggle')
                });
            </script>
        <?php  }
    ?>
    </body>
<?php
} else echo "debe iniciar sesión con una cuenta con previlegios";
?>

</html>