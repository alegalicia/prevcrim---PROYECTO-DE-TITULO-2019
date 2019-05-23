<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/solid.js" integrity="sha384-6FXzJ8R8IC4v/SKPI8oOcRrUkJU8uvFK6YJ4eDY11bJQz4lRw5/wGthflEOX8hjL" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/regular.js" integrity="sha384-Gxfqh68NuE4s0o2renzieYkDYVbdJynynsdrB7UG9yEvgpS9TVM+c4bknWfQXUBg" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/brands.js" integrity="sha384-zJ8/qgGmKwL+kr/xmGA6s1oXK63ah5/1rHuILmZ44sO2Bbq1V3p3eRTkuGcivyhD" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/fontawesome.js" integrity="sha384-Qmms7kHsbqYnKkSwiePYzreT+ufFVSNBhfLOEp0sEEfEVdORDs/aEnGaJy/l4eoy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/panel.css">
</head>

<body>
    <div>
        <ul>
            <li><a href="#"><i class="fas fa-address-book"></i>ADMI. USUARIOS</a>
                <ul class="submenu">
                    <li><a href="admin_nuevo.php" target='cen'><i class="fa fa-glass"></i>Nuevo Usuario</a></li>
                    <li><a href="admin_act.php" target='cen'><i class="fa fa-glass"></i>Actualizar Usuario </a></li>
                    <li><a href="admin_elimina.php" target='cen'><i class="fa fa-glass"></i>Eliminar Usuario </a></li>
                </ul>
        </ul>
        <ul>
            <li><a href="#"><i class="fas fa-address-book"></i>ADMI. INSTITUCIONES</a></li>
            <ul class="submenu">
                <li><a href="admin_nuevo_ins.php" target='cen'><i class="fa fa-glass"></i>Nueva institución</a></li>
                <li><a href="admin_actualizar_ins.php" target='cen'><i class="fa fa-glass"></i>Actualizar institucion </a></li>
                <li><a href="admin_eliminar_ins.php" target='cen'><i class="fa fa-glass"></i>Eliminar Institución</a></li>

            </ul>
        </ul>

        <ul>
            <li><a href="#"><i class="fas fa-atom"></i>Usuario (Jz)</a>
                <ul class="submenu">
                    <li><a target='cen' href="admin_jz_usaurio_nuevo.php"><i class="fa fa-glass"></i>Nuevo Usuario</a></li>
                    <li><a target='cen' href="admin_jz_actualizar.php"><i class="fa fa-glass"></i>Actualiza Usuario</a></li>
                    <li><a target='cen' href="admin_jz_eliminar.php"><i class="fa fa-glass"></i>Eliminar Usuario </a></li>
                </ul>
        </ul>

        <ul>
            <li><a href="#"><i class="fas fa-truck"></i>Delito y delicuente(Jz)</a>
                <ul class="submenu">
                    <li><a target='cen' href="admin_ingresar_delito.php"><i class="fa fa-glass"></i>Ingresar Delito</a></li>
                    <li><a target='cen' href="admin_jz_atecedentes.php"><i class="fa fa-glass"></i>Atecedentes</a></li>
                    <li><a target='cen' href="admin_jz_busqueda.php"><i class="fa fa-glass"></i>Busqueda (pendiente)</a></li>
                    <li><a target='cen' href="admin_jz_delincunete.php"><i class="fa fa-glass"></i>Ingresar Delincuente</a></li>
                    <li><a target='cen' href="admin_jz_parentesco.php"><i class="fa fa-glass"></i>Parentesco (pendiente)</a></li>
                    <li><a target='cen' href="google.php"><i class="fa fa-glass"></i>Google Map </a></li>
                </ul>
        </ul>

        <ul>
            <li><a href="#"><i class="fas fa-truck"></i>Reporte(Jz)</a>
                <ul class="submenu">
                    <li><a target='cen' href="admin_jz_reporte_comuna.php"><i class="fa fa-glass"></i>Estadistícas Comuna</a></li>
                    <li><a target='cen' href="admin_jz_reporte_sector.php"><i class="fa fa-glass"></i>Estadistícas Sector</a></li>
                    <li><a target='cen' href="admin_jz_historico.php"><i class="fa fa-glass"></i>Historico</a></li>
                    <li><a target='cen' href="admin_jz_rankin_comu_sec.php"><i class="fa fa-glass"></i>Ranling Comuna</a></li>
                </ul>
        </ul>
    </div>
</body>

</html>