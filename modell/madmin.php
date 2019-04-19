<?php

class funciones_BD {

    private $db;

    function __construct() {
        
        
 //inicio de la conexion de la base
        require_once '../conexion/conexion.php';
        $this->db = new conexion();
    }
    
//===============INICIO DE SECSION Y SELECTOR DE PERFILS===========

    public function login($usuario, $clave) {

        $sql = "select usuario.primer_nombre, usuario.primer_apellido, usuario.id_perfil, perfil.perfil, usuario.id_institucion,
          usuario.segundo_nombre, usuario.segundo_apellido, usuario.correo, usuario.celular, usuario.fijo,
          usuario.id_institucion, usuario.id_comuna, institucion.institucion, comuna.comuna, provincia.provincia, 
          region.region 
          
          from usuario  
          
          inner join perfil on usuario.id_perfil = perfil.id_perfil
          inner join institucion on usuario.id_institucion = institucion.id_institucion
          inner join comuna on usuario.id_comuna = comuna.id_comuna
          inner join provincia on comuna.id_provincia = provincia.id_provincia
          inner join region on provincia.id_region = region.id_region 
          
          where usuario.estado = 1  and usuario.rut ='" . $usuario . "' and  usuario.clave = md5('" . $clave ."') ";
        $stmt = $this->db->connect()->query($sql);

        $num = 0;
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $num++;
            $_SESSION["login"] = "ok";
            $_SESSION["id_perfil"] = $fila["id_perfil"];
            $_SESSION["primer_nombre"] = $fila["primer_nombre"];
            $_SESSION["segundo_nombre"] = $fila["segundo_nombre"];
            $_SESSION["primer_apellido"] = $fila["primer_apellido"];
            $_SESSION["segundo_apellido"] = $fila["segundo_apellido"];
            $_SESSION["correo"] = $fila["correo"];
            $_SESSION["celular"] = $fila["celular"];
            $_SESSION["fijo"] = $fila["fijo"];
            $_SESSION["provincia"] = $fila["provincia"];
            $_SESSION["region"] = $fila["region"];
            $_SESSION["segundo_apellido"] = $fila["segundo_apellido"];
            $_SESSION["perfil"] = $fila["perfil"];
            $_SESSION["institucion"] = $fila["institucion"];
            
        }
        $opcion = $_SESSION["id_perfil"];
        $ins = $_SESSION["institucion"];
        
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
    
    
    
     //==================== INSERTAR USUARIO===========================  
    
     public function ingresar_usuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, 
            $correo, $celular, $fijo, $comuna, $institucion, $perfil, $clave, $direccion, $rut)  { 
         
            $fecha = date("y/n/j");
            $hora = date("h:i:s"); 
         
        $sql_estado = $this->db->connect()->exec("INSERT INTO `usuario` (`rut`, `clave`, `primer_nombre`, `segundo_nombre`, 
        `primer_apellido`, `segundo_apellido`, `correo`, `celular`, `fijo`, `id_institucion`, 
        `id_comuna`, `direccion`, `id_perfil`, `fecha_actv`, `hora_actv`, `estado`) 
        
        VALUES ('".$rut."', md5('".$clave."'),'".$primer_nombre."', '".$segundo_nombre."', 
        '".$primer_apellido."', '".$segundo_apellido."', '".$correo."', '".$celular."', '".$fijo."', '".$institucion."', 
        '".$comuna."', '".$direccion."', '".$perfil."', '".$fecha."', '".$hora."', '1');");

        if ($sql_estado) {
            echo "<script>alert('FUNCIONARIO INGRESADO CORRECTAMENTE');</script>";
            return true;
            
        } else { echo "<script>alert('EL RUT YA SE ENCUENTRA REGISTRADO');</script>";
            return false;
        }
    }   
    
   // ACTUALIZAR PERSONA
  public function actualizar_usuario($primer_nombre, $segundo_nombre, $primer_apellido , $segundo_apellido, $correo, $celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion) {
      
        $sql_estado = $this->db->connect()->exec("update `usuario`  
        set `primer_nombre` = '".$primer_nombre."', 
            `segundo_nombre` = '".$segundo_nombre."', 
            `primer_apellido` = '".$primer_apellido."', 
            `segundo_apellido` = '".$segundo_apellido."', 
            `correo` = '".$correo."', 
            `celular` = '".$celular."', 
            `fijo` = '".$fijo."', 
            `id_comuna` = '".$comuna."', 
            `id_institucion` = '".$institucion."', 
            `id_perfil` = '".$perfil."', 
            `clave` = '".$clave."', 
            `direccion` = '".$direccion."' 
            
        where `usuario`.`rut` = '".$rut."'");
      
      
            if ($sql_estado) {
                    echo "<script>alert('USUAIO ELIMINADO..!!!');</script>";
            return true;
        } else {
           echo "<script>alert('ERROR !!!);</script>";
            return false;
        }
    }  
    
    
    
       // ELIMINAR USAURIO
  public function eliminar_usuario($rut) {
      
        $sql_estado = $this->db->connect()->exec("update `usuario`  
        set `estado` = '0'
            
        where `usuario`.`rut` = '".$rut."'");
      
      
            if ($sql_estado) {
                    echo "<script>alert('USUAIO ACTUALIZADO..!!!');</script>";
            return true;
        } else {
           echo "<script>alert('ERROR !!!);</script>";
            return false;
        }
    }  
    

    
    
         //==================== INSERTAR institucion===========================  
    
     public function ingresar_institucion($institucion, $monitor)  { 
         
         
        $sql_estado = $this->db->connect()->exec("INSERT INTO `institucion` 
        (`id_institucion`, `institucion`, `monitor`, `estado`) 
         VALUES ('null','".$institucion."','".$monitor."', '1');");

        if ($sql_estado) {
            echo "<script>alert('INSTITUCIÓN INGRESADO CORRECTAMENTE');</script>";
            return true;
            
        } else { echo "<script>alert('ERROR AL CREAR INSTITUCIOÓN');</script>";
            return false;
        }
    }  
    
    
        // ACTUALIZAR INSTITUCION
  public function actualizar_ins($id_institucion, $institucion, $monitor)  {
      
        $sql_estado = $this->db->connect()->exec("update `institucion`  
        set `institucion` = '".$institucion."',
        `monitor` = '".$monitor."'  
        where `institucion`.`id_institucion` = '".$id_institucion."'");
      
      
            if ($sql_estado) {
                    echo "<script>alert('USUAIO ACTUALIZADO..!!!');</script>";
            return true;
        } else {
           echo "<script>alert('ERROR !!!);</script>";
            return false;
        }
    }     
 }
?>