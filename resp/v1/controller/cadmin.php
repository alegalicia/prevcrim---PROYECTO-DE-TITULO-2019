<?php
class funciones {
    
   private $db;
    function __construct() {
        require_once '../conexion/connect.php';
        $this->db = new conexion();
        
    }
}
?>