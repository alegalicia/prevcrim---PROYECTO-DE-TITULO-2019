<?php 
//error_reporting(0);
if(!isset($_SESSION["login"])){session_start(); } 
require_once 'loading.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte por Sector - Comuna</title>
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
   
    <?php //librerias char?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/series-label.js"></script>
<script src="js/modules/exporting.js"></script>
<script src="js/modules/export-data.js"></script>
<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />
<?php ///loading  v2?>
	 <script src="js/jquery-1.8.3.js"></script>
	<style>
.content {
	display:none;
}

.preload {
	margin:0;
	position:absolute;
	top:50%;
	left:50%;
	margin-right: -50%;
	transform:translate(-50%, -50%);
}
</style>
 <style type="text/css">
#container {
    min-width: 310px;
    max-width: 800px;
    height: 400px;
    margin: 0 auto
}
        </style>
    </head>
<?php 

if (isset($_SESSION["id_perfil"])) {
	if ($_SESSION["id_perfil"] == "1") {
?>
<body>
<center>
        <h3>Reporte por periodo Sector/comuna</h3>        
            <br>
            <div class="col-md-3 login-sec">
                <div class="card bg-light">
                    <article class="card-body mx-auto" style="max-width: 400px;">
                        <form method="post" id="f1">
							
							<h5>Periodo Inicio</h5>
                            <div class="form-group input-group">
                              <input type="date" name="inicio" class="form-control">
                            </div>

							<h5>Periodo Fin</h5>
                            <div class="form-group input-group">
                              <input type="date" name="fin" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="buscar" value="buscar"> Buscar</button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
  <div>      
<br>
    <?php
    if(isset($_POST["buscar"])){ ?>
    <hr>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="atrasar2()">
    Estaditca Comuna </button>
    
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" onclick="atrasar()"> Estaditca Sector </button>
    <hr>
    <div class="col-md-10 login-sec">
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0">
            <thead>
                <tr>
                    <th class="th-sm">Cod. Delito</th>
                    <th class="th-sm">Delito</th>
                    <th class="th-sm">Cantidad</th>
                    <th class="th-sm">Comuna</th>
                    <th class="th-sm">sector</th>
                </tr>
            </thead>
            <tbody>
                <?php 
//============ Genera tabla ===============
          require_once('../controller/cadmin.php');
          $lista = new funciones();

          $inicio=$_POST["inicio"]."<br>";
          $fin=$_POST["fin"];
         
          $res = $lista->sector_fecha($inicio, $fin);
          foreach($res as $obj => $o)
          { 

      ?>
                <tr>
                    <td><?php echo "D-".$o['id_delito']?></td>
                    <td><?php echo $o['nombre']?></td>
                    <td><?php echo $o['delito']?></td>
                    <td><?php echo $o['comuna']?></td>
                    <td><?php echo $o['sector']?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="th-sm">Cod. Delito</th>
                    <th class="th-sm">Dellito</th>
                    <th class="th-sm">Catidad</th>
                    <th class="th-sm">Comuna</th>
                    <th class="th-sm">Sector</th>
                </tr>
            </tfoot>
        </table>
               
            <hr>   
                <?php } ?>
                
   </div>

<!-- Modal Cantidad delitos y controles -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estadística del sector</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
   function atrasar(){
      setTimeout ('char()', 500); 
  }   
            
    function char(){   
Highcharts.chart('container1', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Delincuencia por sector'
    },
    subtitle: {
        text: ' '
    },
    xAxis: {
        type: 'datetime',
        dateTimeLabelFormats: { // don't display the dummy year
            month: '%e. %b',
            year: '%b'
        },
        title: {
            text: 'Fecha'
        }
    },
    yAxis: {
        title: {
            text: ''
        },
        min: 0
    },
    tooltip: {
        headerFormat: '<b>{series.name}</b><br>',
        pointFormat: '{point.x:%e. %b}: {point.y:.0f} Cantidad'
    },

    plotOptions: {
        spline: {
            marker: {
                enabled: true
            }
        }
    },

    colors: ['#6CF', '#39F', '#06C', '#036', '#000'],
    series: [{
        name: "SECTOR",
        data: [
            <?php
           $year=0;
           $month=0;
           $day=0;
           $total=0;

            $lista = new funciones();
            $res = $lista->grafico_sector_comuna($inicio, $fin);

            foreach($res as $obj => $o)
            {  

           $year = $o['year'];
           $month = $o['month'];
           $day = $o['day'];
           $total = $o['total'];

            echo "[Date.UTC(".$year.", ".$month.", ".$day."),".$total."],";
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estadística del sector</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
<?php //grafica con comunas ?>                 
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
     function atrasar2(){
      setTimeout ('char1()', 500); 
  }          
    function char1(){       
Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Delincuencia por comuna del sector'
    },
    subtitle: {
        text: ' '
    },
    xAxis: {
        type: 'datetime',
        dateTimeLabelFormats: { // don't display the dummy year
            month: '%e. %b',
            year: '%b'
        },
        title: {
            text: 'Fecha'
        }
    },
    yAxis: {
        title: {
            text: ''
        },
        min: 0
    },
    tooltip: {
        headerFormat: '<b>{series.name}</b><br>',
        pointFormat: '{point.x:%e. %b}: {point.y:.0f} Cantidad'
    },

    plotOptions: {
        spline: {
            marker: {
                enabled: true
            }
        }
    },
    colors: ['#6CF', '#39F', '#06C', '#036', '#000'],
    series: [
           <?php         
            $lista = new funciones();
            $res = $lista->grafico_sector_comuna1($inicio, $fin);
            
            foreach($res as $obj => $o)
            {  
            ?>           
            {       
            <?php     
           $com1 = $o['comuna'];
            $com = $o['id_comuna'];
           echo "";
           echo  "name: \"$com1\"".","; 
             ?>       
        data: [
            <?php
           $year=0;
           $month=0;
           $day=0;
           $total=0;
            $lista1 = new funciones();
            $res1 = $lista1->grafico_sector_comuna2($inicio, $fin, $com);
            foreach($res1 as $obj1 => $o1)
            {                  
           $year = $o1['year'];
           $month = $o1['month'];
           $day = $o1['day'];
           $total = $o1['total'];

            echo "[Date.UTC(".$year.", ".$month.", ".$day."),".$total."],";
            }
            ?>
        ]
        }, 
        <?php 
        }  
        ?>
    ]
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

</div>
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
  } else echo"debe iniciar sesión con una cuenta con previlegios"; ?>
</html>