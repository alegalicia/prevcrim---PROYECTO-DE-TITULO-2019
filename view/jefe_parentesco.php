<?php
error_reporting(0);
if (!isset($_SESSION["id_perfil"])) {
    session_start();
}
require_once 'loading.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parentesco</title>
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

    if ($_SESSION['id_perfil'] == 2) {
        ?>

<body>
    <center>
        <h4>Busqueda Parentesco</h4>

        <form class="login-form" action="jefe_parentesco.php" method="post" name="f1">
            <div class="col-md-8 login-sec">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="th-sm">Seleccion</th>
                            <th class="th-sm">Rut</th>
                            <th class="th-sm">P. Nombre </th>
                            <th class="th-sm">S. Nombre </th>
                            <th class="th-sm">P. Apellido</th>
                            <th class="th-sm">S. Apellido</th>
                            <th class="th-sm">Domicilio</th>
                            <th class="th-sm">Comuna</th>
                        </tr>
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
                            <td align='center'><input type='radio' value="<?php echo $o['rut'] ?>" id='ckhActualizar'
                                    name='buscar' /></td>
                            <td><?php echo $o['rut'] ?></td>
                            <td><?php echo $o['primer_nombre'] ?></td>
                            <td><?php echo $o['segundo_nombre'] ?></td>
                            <td><?php echo $o['primer_apellido'] ?></td>
                            <td><?php echo $o['segundo_apellido'] ?></td>
                            <td><?php echo $o['domicilio'] ?></td>
                            <td><?php echo $o['comuna'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="th-sm">Seleccion</th>
                            <th class="th-sm">Rut</th>
                            <th class="th-sm">P. Nombre </th>
                            <th class="th-sm">S. Nombre </th>
                            <th class="th-sm">P. Apellido</th>
                            <th class="th-sm">S. Apellido</th>
                            <th class="th-sm">Domicilio</th>
                            <th class="th-sm">Comuna</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <button class="btn btn-success" name="b" type="submit" value="buscar">buscar</button>
        </form>

        <?php
if (isset($_POST['buscar'])) {
        $rut = $_POST['buscar'];

        require_once('../controller/cadmin.php');
        $lista = new funciones();
        $res = $lista->busquedaParentesco($rut);
            foreach ($res as $obj => $o) {

                $primerNombre    = $o['primer_nombre'];
                $segundoNombre   = $o['segundo_nombre'];
                $primerApellido  = $o['primer_apellido'];
                $segundoApellido = $o['segundo_apellido'];
                $direccion       = $o['domicilio'];
                $rut             =$o['rut'];

            }
    ?>
        <hr>
        <h4>Resultados de parentesco encontrado</h4>
        <hr>
        <div class="col-md-8 login-sec">
            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th class="th-sm">Rut</th>
                        <th class="th-sm">P. Nombre </th>
                        <th class="th-sm">S. Nombre </th>
                        <th class="th-sm">P. Apellido</th>
                        <th class="th-sm">S. Apellido</th>
                        <th class="th-sm">Domicilio</th>
                        <th class="th-sm">Comuna</th>
                        <th class="th-sm">Grado Parentesco</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            //============ Genera tabla filtrada===============
                            require_once('../controller/cadmin.php');
                            $lista = new funciones();
                            $res = $lista->busquedaSmilitud($primerApellido, $segundoApellido, $direccion);
                            foreach ($res as $obj => $o) {
                                ?>
                    <tr>
                        <?php
                            $primerA    = $o['primer_apellido'];
                            $segundoA   = $o['segundo_apellido'];
                            $dpomicilio = $o['domicilio'];
                            $primerN    = $o['primer_nombre'];
                            $segundoN   = $o['segundo_nombre'];
                            $r          = $o['rut'];

                                    if($primerA == $primerApellido and $rut != $r){
                                         echo "<td>"; echo $o['rut']; echo "</td>";
                                         echo "<td>"; echo $o['primer_nombre']; echo "</td>";
                                         echo "<td>"; echo $o['segundo_nombre']; echo "</td>"; 
                                         echo "<td>"; echo $o['primer_apellido']; echo "</td>"; 
                                         echo "<td>"; echo $o['segundo_apellido']; echo "</td>"; 
                                         echo "<td>"; echo $o['domicilio']; echo "</td>";
                                         echo "<td>"; echo $o['comuna']; echo "</td>";
                                            echo "
                                            <style>
                                            #t1{
                                            Color: red;
                                            font-weight: bolder;
                                            }
                                            </style>
                                            <td id='t1'>Primo por padre</td>";

                                    }

                                        if($segundoA == $segundoApellido and $rut != $r){
                                         echo "<td>"; echo $o['rut']; echo "</td>";
                                         echo "<td>"; echo $o['primer_nombre']; echo "</td>";
                                         echo "<td>"; echo $o['segundo_nombre']; echo "</td>"; 
                                         echo "<td>"; echo $o['primer_apellido']; echo "</td>"; 
                                         echo "<td>"; echo $o['segundo_apellido']; echo "</td>"; 
                                         echo "<td>"; echo $o['domicilio']; echo "</td>";
                                         echo "<td>"; echo $o['comuna']; echo "</td>";
                                        
                                            echo "
                                            <style>
                                            #t1{
                                            Color: red;
                                            font-weight: bolder;
                                            }
                                            </style>
                                            <td id='t1'>Primo por madre </td>";

                                        }

                                         if($dpomicilio == $direccion and $primerA != $primerApellido and $segundoA != $segundoApellido and $rut != $r){
                                        
                                         echo "<td>"; echo $o['rut']; echo "</td>";
                                         echo "<td>"; echo $o['primer_nombre']; echo "</td>";
                                         echo "<td>"; echo $o['segundo_nombre']; echo "</td>"; 
                                         echo "<td>"; echo $o['primer_apellido']; echo "</td>"; 
                                         echo "<td>"; echo $o['segundo_apellido']; echo "</td>"; 
                                         echo "<td>"; echo $o['domicilio']; echo "</td>";
                                         echo "<td>"; echo $o['comuna']; echo "</td>";
                                            echo "
                                            <style>
                                            #t1{
                                            Color: red;
                                            font-weight: bolder;
                                            }
                                            </style>
                                            <td id='t1'>Vieven juntos</td>";

                                            }
                        ?>
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
                        <th class="th-sm">Domicilio</th>
                        <th class="th-sm">Comuna</th>
                        <th class="th-sm">Grado Parentesco</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php

       }  
?>

    </center>
</body>

<?php
} else {
    echo "debe iniciar sesión con un perfil autorizado" .$_SESSION['id_perfil'];
}
    } else {
        echo "debe iniciar sesión";
      }

?>

</html>