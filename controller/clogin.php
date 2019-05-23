<?php
session_start();
class clogin {
  public function __construct() {       
    }
   public function login($usuario, $clave) 
    {
        
        require_once '../modell/madmin.php';
        $ins = new funciones_BD();
        if ($ins->login($usuario, $clave)) {
            $_SESSION['hora'] = time();
                                            }
    }
 }
?>