<?php
error_reporting(0);

if (!isset($_SESSION["login"])) {
  session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prevcrim</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php
if (isset($_SESSION["id_perfil"])) {
  if ($_SESSION["id_perfil"] == 3) {

    ?>

    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
        <header class="main-header">
          <!-- Logo -->
          <a href="" class="logo" style="background-color:#9BDF23;">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Prev</b>crim</span>
          </a>

          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top">

            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only"> </span>
            </a>

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">

                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                  <ul class="dropdown-menu">
                    <li>

                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">

                        <li>
                          <!-- Task item -->
                          <a href="#">
                            <div class="progress xs">
                              <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              </div>
                            </div>
                          </a>
                        </li>
                        <!-- end task item -->
                      </ul>
                    </li>
                  </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="img/logo.png" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo  $_SESSION["primer_apellido"] . ', ' . $_SESSION["primer_nombre"]; ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="img/logo.png" class="img-circle" alt="User Image">

                      <p> <?php echo  $_SESSION["primer_apellido"] . ', ' . $_SESSION["primer_nombre"]; ?>
                        <small><?php echo  $_SESSION["perfil"]; ?></small>
                      </p>
                    </li>

                </li>
                <!-- Menu Footer-->
                <div class="pull-center">
                  <a href="desconectar.php" class="btn btn-default btn-flat">Desconectar</a>
                </div>
                </li>
              </ul>
              </li>
              </ul>
            </div>
          </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">

            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="img/logo.png" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p> <?php echo  $_SESSION["primer_apellido"] . ', ' . $_SESSION["primer_nombre"]; ?> </p>
                <a href="#"><i class="fa fa-circle text-success"></i>Conectado</a>
              </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MENÚ NAVEGACIÓN</li>
              <li class="active treeview menu-open">
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-id-card-o"></i>
                  <span>Panel</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">9</span>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="op_atecedentes.php" target='cen'><i class="fa fa-id-card-o"></i>Antecedentes</a></li>
                  <li><a href="op_busqueda.php" target='cen'><i class="fa fa-id-card-o"></i>Busqueda Total</a></li>
                  <li><a href="op_delincunete.php" target='cen'><i class="fa fa-id-card-o"></i>Ingresar Delincuente</a></li>
                  <li><a href="op_historico.php" target='cen'><i class="fa fa-id-card-o"></i>Historico</a></li>
                  <li><a href="op_parentesco.php" target='cen'><i class="fa fa-id-card-o"></i>Busqueda Parentesco</a></li>
                  <li><a href="op_rankin_comu_sec.php" target='cen'><i class="fa fa-id-card-o"></i>Ranking Comuna</a></li>
                  <li><a href="op_reporte_comuna.php" target='cen'><i class="fa fa-id-card-o"></i>Reporte Comuna</a></li>
                  <li><a href="op_reporte_sector.php" target='cen'><i class="fa fa-id-card-o"></i>Reporte Sector</a></li>
                  <li><a href="op_ingresar_delito.php" target='cen'><i class="fa fa-id-card-o"></i>Ingresar Delito</a></li>
                </ul>
              </li>
            </ul>

          </section>
          <!-- /.sidebar -->
        </aside>
        <!-- =========================================================================================================== -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              SOLOBINARY
              <small style="color: red;">Mesa de ayuda: 133-133-133</small>
            </h1>
          </section>

          <!-- Main content -->
          <section class="content">
            <!-- Info boxes -->
            <button id="cambia" type="button" class="btn btn-default"><span class="glyphicon glyphicon-align-left"></span></button>
            <!-- boton cultar menu -->

            <script>
              $(document).ready(function() {
                $("#cambia").click(function() {
                  $("#texto").toggle(500);
                });
              });
            </script>
            <div class="row" id="texto">

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                  <div class="info-box-content">
                    <?php //graficos de inicio 
                    $comuna = $_SESSION["id_comuna"];

                    require_once '../controller/cadmin.php';
                    $obj = new funciones();
                    //==================LISTA DE comunas =============
                    $lista = $obj->delincuentePrincipal();
                    foreach ($lista as $key => $o) {
                      $total = $o['total'];
                      $apodo = $o['apodo'];
                    }
                    ?>
                    <span class="info-box-text">DELINCUENTE MAS PELIGRO</span>
                    <span class="info-box-number">Apodo: <?php echo $apodo; ?></span>
                    <span class="info-box-text"><strong> Cantidad <?php echo $total; ?></strong></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>

                <!-- /.info-box -->
              </div>

              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="ion ion-planet"></i></span>

                  <div class="info-box-content">
                    <?php //graficos de inicio 
                    $comuna = $_SESSION["id_comuna"];

                    require_once '../controller/cadmin.php';
                    $obj = new funciones();
                    //==================LISTA DE comunas =============
                    $lista = $obj->comunaPrincipal();
                    foreach ($lista as $key => $o) {
                      $total = $o['total'];
                      $comuna = $o['comuna'];
                    }
                    ?>
                    <span class="info-box-text">COMUNA CON MAS DELITA</span>
                    <span class="info-box-number">Comuna: <?php echo $comuna; ?></span>
                    <span class="info-box-text"><strong>Cantidad: <?php echo $total; ?></strong></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix visible-sm-block"></div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="ion ion-ios-speedometer"></i></span>

                  <div class="info-box-content">
                    <?php //graficos de inicio 
                    $comuna = $_SESSION["id_comuna"];
                    require_once '../controller/cadmin.php';
                    $obj = new funciones();
                    //==================LISTA DE comunas =============
                    $lista = $obj->delitoPrincipal();
                    foreach ($lista as $key => $o) {
                      $total = $o['total'];
                      $delito = $o['delito'];
                    }
                    ?>
                    <span class="info-box-text">DELICTO PRINCIO </span>
                    <span class="info-box-number">Día: <?php echo $delito; ?></span>
                    <span class="info-box-text"><strong>Cantidad: <?php echo $total; ?></strong></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                  <div class="info-box-content">
                    <?php //graficos de inicio 
                    $comuna = $_SESSION["id_comuna"];
                    require_once '../controller/cadmin.php';
                    $obj = new funciones();
                    //==================LISTA DE comunas =============
                    $lista = $obj->diaPrincipal();
                    foreach ($lista as $key => $o) {
                      $total = $o['total'];
                      $fecha = $o['fecha'];
                    }
                    ?>
                    <span class="info-box-text">DÍA MAS DELICTIVO</span>
                    <span class="info-box-number">Día: <?php echo $fecha; ?></span>
                    <span class="info-box-text"><strong>Cantidad: <?php echo $total; ?></strong></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <!-- ======================================================================iframe========== -->
            </div>
            <div class="box-footer">

              <iFRAME name="cen" height="600px" width="100%" SRC="inicio.php"></iFRAME>

            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
      <!-- /.row -->
      </section>
      <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.2
        </div>
        <strong> PROYECTO TITULACIÓN: SOLOBINARY {Copy Rigth 2019: Alejandro Galicia - Patricio Tamayo}</strong> All rights
        reserved.
      </footer>

      </div>

      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- Sparkline -->
      <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
      <!-- jvectormap  -->
      <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- SlimScroll -->
      <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- ChartJS -->
      <script src="bower_components/chart.js/Chart.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard2.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
    </body>
  <?php
}
} else {
  echo "debe iniciar secion con un perfil autorizado";
}

?>

</html>