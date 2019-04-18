<?php
header('Content-Type: text/html; charset=UTF-8');
header('Content-Type: text/html; charset=iso-8859-1');

class funciones_BD {

    private $db;

    function __construct() {
        
        
 //inicio de la conexion de la base
        require_once '../conexion/conexion.php';
        $this->db = new conexion();
    }
    //===============INICIO DE SECSION Y SELECTOR DE PERFILS===========

    public function login($usuario, $clave) {

        $sql = "select primer_nombre, primer_apellido, id_perfil from usuario  where estado = 1  and rut ='" . $usuario . "' and  clave = '" . $clave . "' ";
        $stmt = $this->db->connect()->query($sql);

        $num = 0;
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $num++;
            $_SESSION["login"] = "ok";
            $_SESSION["id_perfil"] = $fila["id_perfil"];
            $_SESSION["primer_nombre"] = $fila["primer_nombre"];
            $_SESSION["primer_apellido"] = $fila["primer_apellido"];
            
        }
        $opcion = $_SESSION["id_perfil"];
        
        if ($num > 0) {

            switch ($opcion) {

            case "1":
            echo "<meta http-equiv='refresh' content='0;url=../view/admin_panel.php'>";
            break; //Perfil Administrador General

            case "2":
            echo "<meta http-equiv='refresh' content='0;url=../view/jefe_panel.php'>";
            break;// Perfil Jefe de Zona

            case "3":
            echo "<meta http-equiv='refresh' content='0;url=../view/operador_panel.php'>";
            break; // perfil Operador
                    
                    
            default: echo "<script>alert('error en el perfil');</script>";
                      
            }

        }else echo "<meta http-equiv='refresh' content='0;url=../view/index.php'>";

    }
    
 }
?>