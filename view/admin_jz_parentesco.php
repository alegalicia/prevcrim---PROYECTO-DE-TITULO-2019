<?php
error_reporting(0);
if (!isset($_SESSION["id_perfil"])) {
    session_start();
}
require_once 'loading.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Busqueda</title>
    <link rel="stylesheet" href="">
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
            loadingRecords: "Busqueda en curso...",
            zeroRecords: "No se encontro dato",
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
if (isset($_SESSION['perfil'])) {

    if ($_SESSION['id_perfil'] == 1) {
        ?>

<body>
    <center>
        <h4>Busqueda en calquier campo</h4>

        <div class="col-md-5 login-sec">
            <form class="login-form" action="admin_elimina.php" method="get" name="f1">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="th-sm">Rut</th>
                            <th class="th-sm">P. Nombre </th>
                            <th class="th-sm">S. Nombre </th>
                            <th class="th-sm">P. Apellido</th>
                            <th class="th-sm">S. Apellido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //============ Genera tabla ===============
                            require_once('../controller/cadmin.php');
                            $lista = new funciones();
                            $res = $lista->busqueda();
                            foreach ($res as $obj => $o) {
                                ?>
                        <tr>
                            <td><?php echo $o['rut'] ?></td>
                            <td><?php echo $o['primer_nombre'] ?></td>
                            <td><?php echo $o['segundo_nombre'] ?></td>
                            <td><?php echo $o['primer_apellido'] ?></td>
                            <td><?php echo $o['segundo_apellido'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="th-sm">Rut</th>
                            <th class="th-sm">P. Nombre </th>
                            <th class="th-sm">S. Nombre </th>
                            <th class="th-sm">P. Apellido</th>
                            <th class="th-sm">S. Apellido</th>
                        </tr>
                    </tfoot>
                </table>
            </form>

    </center>
</body>

<?php
} else {
    echo "debe iniciar sesión con un perfil autorizado";
}
} else {
    echo "debe iniciar sesión";
}

?>

</html>