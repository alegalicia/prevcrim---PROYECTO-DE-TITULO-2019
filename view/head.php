<?php
error_reporting(0);

if (!isset($_SESSION["login"])) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PREVCRIM</title>
    <link rel="stylesheet" href="css/csshead.css">
    <link rel="stylesheet" href="css/panel.css">
</head>

<body>

    <h3>
        <?php
        //detalle usuairo
        if (isset($_SESSION["primer_apellido"])) {
            setlocale(LC_ALL, "es_ES");
            date_default_timezone_set("Chile/Continental");
            echo ' Bienvenido: ' . $_SESSION["primer_apellido"] . ', ' . $_SESSION["primer_nombre"] . ' ';
            echo "<br>";
            echo $_SESSION["perfil"];
        } else echo "sin sesión";
        ?></h3>
    <strong id="desc"><a href="desconectar.php" target='home'>Cerrar Sesión</a></strong>
    <hr>
    <style>
        #desc {
            float: right;
            width: 100px;
            line-height: 80%;
            font-size: 11px;
        }
    </style>
</body>

</html>