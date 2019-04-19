<?php
if(!isset($_SESSION["login"])){session_start(); } 
    require_once 'loading.php';
    require_once '../controller/cadmin.php';

    $id_institucion   = isset($_REQUEST['id_institucion'])?$_REQUEST['id_institucion']:isset($_REQUEST['id_institucion']);

     $ingresar  = isset($_REQUEST['ingresar'])?$_REQUEST['ingresar']:isset($_REQUEST['ingresar']);
 
 if ($ingresar == "eliminar"){   
     
          $act = new funciones(); 
          $registrar = $act->eliminar_ins($id_institucion);
     
} else 
echo $id_institucion;
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
    
</head>
<?php 
    if($_SESSION["id_perfil"] == 1)
    { 
?>

<body>

    <center>
        <br>
        <h1> Actualizar Institucion: </h1>
        <div class="col-md-8 login-sec">
            <form class="login-form" action="admin_eliminar_ins.php" method="post" name="f1">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="th-sm">Eliminar</th>
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
            foreach($res as $obj => $o)
              { $fac = $o['id_institucion'];
                  ?>
                        <tr>
                            <td align='center'><input type='radio' value="<?php echo $o['id_institucion'] ?>" id='ckhActualizar' name='id_institucion' /></td>
                            <td><?php echo $o['institucion']?></td>
                            <td><?php echo $o['monitor']?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Eliminar</th>
                            <th>Institucion</th>
                            <th>Monitor</th>
                        </tr>
                    </tfoot>
                </table>
              <button  class="btn btn-success btn-block" name="ingresar" type="submit" value="eliminar">Aceptar</button>
            </form>
        </div>
        <br>
    </center>
    
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
   }else echo"debe iniciar sesión con una cuenta con previlegios";
?>

</html>