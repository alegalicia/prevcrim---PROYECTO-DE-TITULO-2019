<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}

require_once 'loading.php';
require_once '../controller/cadmin.php';

$sector   = isset($_REQUEST['sector']) ? $_REQUEST['sector'] : isset($_REQUEST['sector']);

$descripcion   = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : isset($_REQUEST['descripcion']);

$ingresar  = isset($_REQUEST['ingresar']) ? $_REQUEST['ingresar'] : isset($_REQUEST['ingresar']);

if ($ingresar == "crear") {
    $nSector = new funciones();
    $registrar = $nSector->nuevSector($descripcion, $sector);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Sector</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .pink-textarea textarea.md-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }

        .active-pink-textarea.md-form label.active {
            color: #f48fb1;
        }

        .amber-textarea textarea.md-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #ffa000;
            box-shadow: 0 1px 0 0 #ffa000;
        }

        .active-amber-textarea.md-form label.active {
            color: #ffa000;
        }


        .active-pink-textarea-2 textarea.md-textarea {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }

        .active-pink-textarea-2.md-form label.active {
            color: #f48fb1;
        }

        .active-pink-textarea-2.md-form label {
            color: #f48fb1;
        }


        .active-amber-textarea-2 textarea.md-textarea {
            border-bottom: 1px solid #ffa000;
            box-shadow: 0 1px 0 0 #ffa000;
        }

        .active-amber-textarea-2.md-form label.active {
            color: #ffa000;
        }

        .active-amber-textarea-2.md-form label {
            color: #ffa000;
        }
    </style>
    <!-- Script alerta modificado -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php
if ($_SESSION["id_perfil"] == 1) {
    ?>

    <body>
        <br>
        <center>
            <h4>Agregar Comuna a sector</h4>
            <div class="container">
                <br>
                <form method="post">

                </form>
                </article>
            </div>
        </center>
    </body>
<?php
} else {
    echo "debe iniciar sesión";
    echo "<meta http-equiv='refresh' content='0;url=../index.html'>";
}
?>


</html