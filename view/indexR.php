<?php
//error_reporting(0);

if (!isset($_SESSION["login"])) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
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

                  <li><!-- Task item -->
                    <a href="#">
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
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
              <span class="hidden-xs"><?php echo  $_SESSION["primer_apellido"] . ', ' . $_SESSION["primer_nombre"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/logo.png" class="img-circle" alt="User Image">

                <p> <?php echo  $_SESSION["primer_apellido"] . ', ' . $_SESSION["primer_nombre"];?>
                  <small><?php echo  $_SESSION["perfil"];?></small>
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
          <p> <?php echo  $_SESSION["primer_apellido"] . ', ' . $_SESSION["primer_nombre"];?> </p>
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
            <i class="fa fa-files-o"></i>
            <span>Administr Usuario</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_nuevo.php" target='cen'><i class="fa fa-glass"></i>Nuevo Usuario</a></li>
            <li><a href="admin_act.php" target='cen'><i class="fa fa-glass"></i>Actualizar Usuario </a></li>
            <li><a href="admin_elimina.php" target='cen'><i class="fa fa-glass"></i>Eliminar Usuario </a></li>
          </ul>
        </li>   
      </ul>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview menu-open"> 
        </li>

      <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> Adm. Institución </span>
            <span class="pull-right-container">
              <span class="label label-success pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="admin_nuevo_ins.php" target='cen'><i class="fa fa-glass"></i>Nueva institución</a></li>
                <li><a href="admin_actualizar_ins.php" target='cen'><i class="fa fa-glass"></i>Actualizar institucion </a></li>
                <li><a href="admin_eliminar_ins.php" target='cen'><i class="fa fa-glass"></i>Eliminar Institución</a></li>
          </ul>
        </li>   
      </ul>

    <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview menu-open"> 
        </li>

      <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> Delito Delincuente</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right">7</span>
            </span>
          </a>
          <ul class="treeview-menu">
                    <li><a target='cen' href="admin_ingresar_delito.php"><i class="fa fa-glass"></i>Ingresar Delito</a></li>
                    <li><a target='cen' href="admin_jz_atecedentes.php"><i class="fa fa-glass"></i>Atecedentes</a></li>
                    <li><a target='cen' href="admin_jz_busqueda.php"><i class="fa fa-glass"></i>Busqueda</a></li>
                    <li><a target='cen' href="admin_jz_delincunete.php"><i class="fa fa-glass"></i>Ingresar Delincuente</a></li>
                    <li><a target='cen' href="admin_jz_parentesco.php"><i class="fa fa-glass"></i>Parentesco</a></li>
                    <li><a target='cen' href="google.php"><i class="fa fa-glass"></i>Google Map </a></li>
          </ul>
        </li>   
      </ul>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview menu-open"> 
        </li>

      <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> Admi. Usuario (JZ) </span>
            <span class="pull-right-container">
              <span class="label label-warning pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="admin_nuevo_ins.php" target='cen'><i class="fa fa-glass"></i>Nueva institución</a></li>
                <li><a href="admin_actualizar_ins.php" target='cen'><i class="fa fa-glass"></i>Actualizar institucion </a></li>
                <li><a href="admin_eliminar_ins.php" target='cen'><i class="fa fa-glass"></i>Eliminar Institución</a></li>
          </ul>
        </li>   
      </ul>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview menu-open"> 
        </li>

      <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> Reporte (JZ) </span>
            <span class="pull-right-container">
              <span class="label label-info pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
                    <li><a target='cen' href="admin_jz_reporte_comuna.php"><i class="fa fa-glass"></i>Estadistícas Comuna</a></li>
                    <li><a target='cen' href="admin_jz_reporte_sector.php"><i class="fa fa-glass"></i>Estadistícas Sector</a></li>
                    <li><a target='cen' href="admin_jz_historico.php"><i class="fa fa-glass"></i>Historico</a></li>
                    <li><a target='cen' href="admin_jz_rankin_comu_sec.php"><i class="fa fa-glass"></i>Ranling Comuna</a></li>
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
        <small>Version 1.1</small>
      </h1>
     </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
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
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
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
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        

<!-- ======================================================================iframe========== -->
      </div>
            <div class="box-footer">
            
                <iFRAME name= "cen"  height="480px" width="100%" SRC="inicio.php" overflow-y='scroll' overflow-x='hidden' scrolling="no"></iFRAME>
             
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
      <b>Version</b> 2.4.0
    </div>
    <strong> PROYECO TITULACION: SOLOBINARY {Copy Rigth 2019: Alejandro Galicia - Patricio Tamayo}</strong> All rights
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
</html>
