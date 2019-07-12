<?php
//error_reporting(0);
if (!isset($_SESSION["id_perfil"])) {
    session_start();
}
require_once 'loading.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resumen Institución</title>
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
</head>

<body>
    <?php
    if (isset($_SESSION['perfil'])) {

        if ($_SESSION['id_perfil'] == 1) {

            ?>
  <div class="col-md-10 login-sec">
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
            <thead>
                <tr>
                    <th class="th-sm">Cod. Inst.</th>
                    <th class="th-sm">Institución</th>
                    <th class="th-sm">Sector</th>
                    <th class="th-sm">Cantidad</th>
                </tr>
            </thead>
            <tbody>

            <?php
                //============ Genera tabla ===============
                require_once('../controller/cadmin.php');
                $lista = new funciones();
                $res = $lista->lista_sectores_inst();
                foreach ($res as $obj => $o) {
            ?>
                <tr>
                    <td><?php echo "I-".$o['id_institucion']?></td>
                    <td><?php echo $o['institucion']?></td>
                    <td><?php echo $o['sector']?></td>
                    <td><?php echo $o['total']?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="th-sm">Cod. Inst.</th>
                    <th class="th-sm">Institución</th>
                    <th class="th-sm">Sector</th>
                    <th class="th-sm">Cantidad</th>
                </tr>
            </tfoot>
        </table>

<!-- GENERA TABLA EN ESPAÑOL -->
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
        <?php
        } else {
            echo "debe iniciar sesión con un perfil autorizado";
        }
    } else {
        echo "debe iniciar sesión";
    }

    ?>
</body>

</html>