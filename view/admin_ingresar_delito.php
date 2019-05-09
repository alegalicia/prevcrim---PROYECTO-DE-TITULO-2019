<?php
if(!isset($_SESSION["login"])){session_start(); } 
    require_once 'loading.php';
    require_once '../controller/cadmin.php';

     $rut   = isset($_REQUEST['rut'])?$_REQUEST['rut']:isset($_REQUEST['rut']);
     $ingresar  = isset($_REQUEST['ingresar'])?$_REQUEST['ingresar']:isset($_REQUEST['ingresar']);
 
 if ($ingresar == "alizar"){   
      $act = new funciones();     
     $registrar = $act->eliminar_usuario($rut);
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-   ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>
<?php 
    if($_SESSION["id_perfil"] == 1)
    { 
?>

<body>
    <center>
        <br>
        <h6> Buscar Delincuente: </h6>
        <div class="col-md-8 login-sec">
            <form class="login-form" action="admin_ingresar_delito.php" method="post" name="f1">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="th-sm">Delito</th>
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
            foreach($res as $obj => $o)
              { $fac = $o['rut'];
          ?>
                        <tr>
                            <td align='center'>
                                <input type='radio' value="
                                <?php 
                                echo "RUT Delincuente: ".$o['rut']."<br>"." Nombre: ".$o['primer_nombre'] ." Apellido: ".$o['primer_apellido']."<br>" 
                                ?>" id='ckhActualizar' name='update' />
                            </td>
                            <td><?php echo $o['rut']?></td>
                            <td><?php echo $o['primer_nombre']?></td>
                            <td><?php echo $o['primer_apellido']?></td>
                            <td><?php echo $o['institucion']?></td>
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
                            <th>Institución</th>
                        </tr>
                    </tfoot>

                </table>
                <button type="submit" class="btn btn-success" name="modal" value="modal" data-toggle="modal" data-target="#exampleModal">Ingresar Delito</button>
            </form>


        </div>
        <br>
        <form class="login-form" action="admin_ingresar_delito.php" method="post" name="f1">
           
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DELITO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                                <?php 
                                echo $_POST['update'];    
                                ?>
                            <br>
                                Delito: <input type="text" id="delito">
                                Delito: <input type="text" id="delito">
                                Delito: <input type="text" id="delito">
                                Delito: <input type="text" id="delito">
                                Delito: <input type="text" id="delito">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </center>
    <?php 
      if(isset($_POST['update'])){  
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

        }else echo"debe iniciar sesión con una cuenta con previlegios";
?>

</html>