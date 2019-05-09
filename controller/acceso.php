<?php
error_reporting(0);//oculta errores
try {
    
    $opcion = $_REQUEST['opcion'];
    
    switch ($opcion) {
            
    case "login":

            require_once 'clogin.php';

            $usuario = trim($_REQUEST['usuario']);
            $clave = trim($_REQUEST['clave']);

            $obj_login = new Clogin();

            try {
                $obj_login->login($usuario, $clave);
            } catch (Exception $e) {
                
            }
    }
    
}  
    catch (Exception $e) {
      echo "<script>alert('error con la conexion');</script>";   
    
}

?>