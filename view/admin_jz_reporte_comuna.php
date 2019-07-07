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
    <?php
    ?>
    <script src="js/highcharts.js"></script>
    <script src="js/modules/exporting.js"></script>
    <script src="js/modules/export-data.js"></script>

    <script src="../jquery-1.4.2.min.js" type="text/javascript"></script>
</head>

<?php
if ($_SESSION["id_perfil"] == 1) {
    require_once('../controller/cadmin.php');
    $obj = new funciones();

    //==================LISTA DE comunas =============       

    $lista1 = $obj->lista_comuna_prov_reg();
    $select1 = '';
    foreach ($lista1 as $key1 => $value1) {
        $select1 .= '<option value="' . $value1["id_comuna"] . '">' . $value1["comuna"] . ", " . $value1["provincia"] . " - " . $value1["region"] . '</option>';
    }
    ?>

    <body>
        <center>

            <h4>Reporte por comuna</h4>
            <div class="container">
                <br>
                <div class="col-md-10 login-sec">
                    <div class="card bg-light">
                        <article class="card-body mx-auto" style="max-width: 400px;">
                            <form method="post">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <select name="comuna" class="form-control"><?php echo $select1; ?></select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" name="buscar" value="buscar"> Buscar Comuna</button>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
            <br>
            <?php
            if (isset($_POST["buscar"])) { ?>

                <div class="col-md-8 login-sec">
                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="th-sm">Comuna</th>
                                <th class="th-sm">Tipo</th>
                                <th class="th-sm">Rut</th>
                                <th class="th-sm">Nombre</th>
                                <th class="th-sm">Apellido</th>
                                <th class="th-sm">Ult.Direccion</th>
                                <th class="th-sm">Delito</th>
                                <th class="th-sm">Fecha</th>
                                <th class="th-sm">Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //============ Genera tabla ===============
                            require_once('../controller/cadmin.php');
                            $lista = new funciones();
                            $comuna = $_POST["comuna"];
                            $comuna1 = $comuna;
                            $res = $lista->reporte_comuna_delito($comuna);
                            foreach ($res as $obj => $o) {

                                ?>
                                <tr>
                                    <td><?php echo $o['comuna'] ?></td>
                                    <td><?php echo $o['tipo'] ?></td>
                                    <td><?php echo $o['id_delincuente'] ?></td>
                                    <td><?php echo $o['primer_nombre'] ?></td>
                                    <td><?php echo $o['primer_apellido'] ?></td>
                                    <td><?php echo $o['direccion'] ?></td>
                                    <td><?php echo $o['delito'] ?></td>
                                    <td><?php echo $o['fecha'] ?></td>
                                    <td><?php echo $o['hora'] ?></td>
                                </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="th-sm">Comuna</th>
                                <th class="th-sm">Tipo</th>
                                <th class="th-sm">Rut</th>
                                <th class="th-sm">Nombre</th>
                                <th class="th-sm">Apellido</th>
                                <th class="th-sm">Ult.Direccion</th>
                                <th class="th-sm">Delito</th>
                                <th class="th-sm">Fecha</th>
                                <th class="th-sm">Hora</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div>
                    <hr>
                    <?php
                    $lista = new funciones();
                    $res = $lista->cuenta_comuna_delitos($comuna);
                    foreach ($res as $obj => $o) {
                        $cantidadDelito = $o['delito'];
                    }

                    $lista = new funciones();
                    $res = $lista->cuenta_comuna_contorl($comuna);
                    foreach ($res as $obj => $o) {
                        $controles = $o['control'];
                    }
                    ?>

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="atrasar()">
                        Estaditicas delitos y controles
                    </button>

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" onclick="atrasar2()">
                        Top 5 de Delitos
                    </button>
                    <hr>
                </div>
                <?php   ?>

                <!-- Modal Cantidad delitos y controles -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Indicadores de delitos y controles</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                                <script type="text/javascript">
                                    function atrasar() {
                                        setTimeout('char()', 500);
                                    }

                                    function char() {
                                        Highcharts.chart('container', {
                                            chart: {
                                                plotBackgroundColor: null,
                                                plotBorderWidth: null,
                                                plotShadow: false,
                                                type: 'pie'
                                            },
                                            title: {
                                                text: ' '
                                            },
                                            tooltip: {
                                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                            },
                                            plotOptions: {
                                                pie: {
                                                    allowPointSelect: true,
                                                    cursor: 'pointer',
                                                    dataLabels: {
                                                        enabled: true,
                                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                        style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                        }
                                                    }
                                                }
                                            },
                                            series: [{
                                                name: 'Catidad',
                                                colorByPoint: true,
                                                data: [{
                                                    name: 'Delitos',
                                                    y: <?php echo $cantidadDelito; ?>,
                                                    sliced: false,
                                                    selected: true
                                                }, {
                                                    name: 'Controles',
                                                    y: <?php echo $controles; ?>,
                                                }, ]
                                            }]
                                        });
                                    }
                                </script>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="atrasar2()">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Cantidad delitos y controles -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TOP 5 de Delitos de comuna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                                <?php
                                ?>
                                <script type="text/javascript">
                                    function atrasar2() {
                                        setTimeout('char1()', 500);
                                    }

                                    function char1() {
                                        Highcharts.chart('container1', {
                                            chart: {
                                                plotBackgroundColor: null,
                                                plotBorderWidth: null,
                                                plotShadow: false,
                                                type: 'pie'
                                            },
                                            title: {
                                                text: ' '
                                            },
                                            tooltip: {
                                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                            },
                                            plotOptions: {
                                                pie: {
                                                    allowPointSelect: true,
                                                    cursor: 'pointer',
                                                    dataLabels: {
                                                        enabled: true,
                                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                        style: {
                                                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                        }
                                                    }
                                                }
                                            },
                                            series: [{
                                                name: 'Catidad',
                                                colorByPoint: true,
                                                data: [
                                                    <?php
                                                    //traemos los datos
                                                    $lista = new funciones();
                                                    $res = $lista->cuenta_comuna_mxa5($comuna);
                                                    foreach ($res as $obj => $o) {
                                                        $delito = $o['delito'];
                                                        $total = $o['total'];
                                                        $total = (int)$total;
                                                        echo "{";
                                                        echo "name: '" . $delito . "',";
                                                        echo "y:" . $total . ",";
                                                        echo "sliced: false,";
                                                        echo "elected: true";
                                                        echo "},";
                                                    }
                                                    ?>
                                                ]
                                            }]
                                        });
                                    }
                                </script>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>TOP 5 de delincuentes de la comuna</h4>
                <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                <script type="text/javascript">
                    Highcharts.chart('container2', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: true,
                            type: 'pie'
                        },
                        title: {
                            text: ' '
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Catidad',
                            colorByPoint: true,
                            data: [
                                <?php
                                //traemos los datos
                                $lista = new funciones();
                                $res = $lista->top_delincuentes($comuna);
                                foreach ($res as $obj => $o) {
                                    $delincuente = $o['id_delincuente'];
                                    $total = $o['total'];
                                    $apodo = $o['apodo'];
                                    $total = (int)$total;
                                    echo "{";
                                    echo "name:'Apodo: " . $apodo . " <br>RUT:" . $delincuente . "',";
                                    echo "y:" . $total . ",";
                                    echo "sliced: false,";
                                    echo "elected: true";
                                    echo "},";
                                }
                                ?>
                            ]
                        }]
                    });
                </script>
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
        </body>
    <?php
}
} else echo "debe iniciar sesión con una cuenta con previlegios";
?>

</html>