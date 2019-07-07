<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}
require_once 'loading.php';
require_once '../controller/cadmin.php';

$institucion   = isset($_REQUEST['institucion']) ? $_REQUEST['institucion'] : isset($_REQUEST['institucion']);

$id_institucion   = isset($_REQUEST['id_institucion']) ? $_REQUEST['id_institucion'] : isset($_REQUEST['id_institucion']);

$monitor         = isset($_REQUEST['monitor']) ? $_REQUEST['monitor'] : isset($_REQUEST['monitor']);

$ingresar  = isset($_REQUEST['ingresar']) ? $_REQUEST['ingresar'] : isset($_REQUEST['ingresar']);

if ($ingresar == "actualizar") {
    $act = new funciones();
    $registrar = $act->actualizar_ins($id_institucion, $institucion, $monitor);
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

</head>
<?php
if ($_SESSION["id_perfil"] == 1) {
    ?>
    <body>
        <center>
            <br>
            <h4> Actualizar Institucion: </h4>
            <div class="col-md-8 login-sec">
                <form class="login-form" action="admin_actualizar_ins.php" method="post" name="f1">
                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="th-sm">Editar</th>
                                <th class="th-sm">Institucion</th>
                                <th class="th-sm">Monitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //============ Genera tabla ===============
                            require_once('../controller/cadmin.php');
                            $lista = new funciones();
                            $res = $lista->lista_inst();
                            foreach ($res as $obj => $o) {
                                $fac = $o['id_institucion'];
                                ?>
                                <tr>
                                    <td align='center'><input type='radio' value="<?php echo $o['id_institucion'] ?>" id='ckhActualizar' name='update' /></td>
                                    <td><?php echo $o['institucion'] ?></td>
                                    <td><?php echo $o['monitor'] ?></td>
                                </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Editar</th>
                                <th>Institucion</th>
                                <th>Monitor</th>
                            </tr>
                        </tfoot>
                    </table>
                    <button class="btn btn-success" name="editar" type="submit" value="editar">Aceptar</button>
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
                    $res = $lista->lista_inst_a($id);
                    foreach ($res as $obj => $o) {
                        $fac = $o['id_institucion'];

                        $obj = new funciones();
                    }
                    ?>
                    <hr>
                    <div class="card bg-light">
                        <article class="card-body" style="max-width: 400px;">
                            <form action="admin_actualizar_ins.php" method="get">

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="institucion" class="form-control" type="text" required maxlength="30" value="<?php echo $o['institucion'] ?>">
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="monitor" class="form-control" type="text" required maxlength="30" value="<?php echo $o['monitor'] ?>">
                                </div>

                                <input type="hidden" name="id_institucion" value="<?php echo $o['id_institucion'] ?>">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" name="ingresar" value="actualizar"> Actualizar institucion</button>
                                </div>
                            </form>
                        </article>
                    </div>
                    <hr>
                <?php
            }
            ?>
            </div>
        </center>
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
    </body>
<?php
} else echo "debe iniciar sesión con una cuenta con previlegios";
?>

</html>