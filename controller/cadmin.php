<?php
class funciones {
    
   private $db;
    function __construct() {
        require_once '../conexion/conexion.php';
        $this->db = new conexion();
        
    }
    
    
    
   //==================== listado de insituciones  ===========================
    public function lista_inst() {        
        $sql = "select id_institucion, institucion, monitor from `institucion` where estado=1 ";
            
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
    } 
    
    
    //==================== listado de comunas  ===========================
    public function lista_comuna() {
        $sql = "select id_comuna, comuna from `comuna` order by comuna asc";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }    
    
    
  //==================== listado deperfil  ===========================
    public function lista_perfil() {
        $sql = "select id_perfil, perfil from `perfil` order by perfil asc";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }      
    
    
    
    //==================== INSERTAR USUARIO ===========================  
    
     public function ingresar_usuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, 
            $correo, $celular, $fijo, $comuna, $institucion, $perfil, $clave, $direccion, $rut) 
     { 
           require_once '../modell/madmin.php';

        try {
            $lista = new funciones_BD();
            $list = $lista->ingresar_usuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, 
            $correo, $celular, $fijo, $comuna, $institucion, $perfil, $clave, $direccion, $rut);
            
            if ($lista) {
                return true;
            } else {
                
                return false;
            }
        } 
         
         catch (Exception $e) {
         echo "<script>alert('ERROR AL INGRESAR ACTIVIDAD NIVEL 1');</script>";
        }
    } 
    
    
   //==================== listado usuarios  ===========================
    public function lista_usuario() {
        $sql = "select usuario.primer_nombre, usuario.primer_apellido, usuario.id_perfil, perfil.perfil, usuario.id_institucion,
          usuario.segundo_nombre, usuario.segundo_apellido, usuario.correo, usuario.celular, usuario.fijo,
          usuario.id_institucion, usuario.id_comuna, institucion.institucion, comuna.comuna, provincia.provincia, 
          region.region, usuario.rut , usuario.estado
           
          from usuario  
          
          inner join perfil on usuario.id_perfil = perfil.id_perfil
          inner join institucion on usuario.id_institucion = institucion.id_institucion
          inner join comuna on usuario.id_comuna = comuna.id_comuna
          inner join provincia on comuna.id_provincia = provincia.id_provincia
          inner join region on provincia.id_region = region.id_region 
          where usuario.estado = 1";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }     
    
    
     //==================== buscar usuarios  ===========================
    public function buscar_usuario($id) {
        $sql = "select usuario.primer_nombre, usuario.primer_apellido, usuario.id_perfil, perfil.perfil, usuario.id_institucion,
          usuario.segundo_nombre, usuario.segundo_apellido, usuario.correo, usuario.celular, usuario.fijo,
          usuario.id_institucion, usuario.id_comuna, institucion.institucion, comuna.comuna, provincia.provincia, 
          region.region, usuario.rut, usuario.direccion, usuario.id_comuna   
           
          from usuario  
          
          inner join perfil on usuario.id_perfil = perfil.id_perfil
          inner join institucion on usuario.id_institucion = institucion.id_institucion
          inner join comuna on usuario.id_comuna = comuna.id_comuna
          inner join provincia on comuna.id_provincia = provincia.id_provincia
          inner join region on provincia.id_region = region.id_region 
          where usuario.estado = 1 and 
          usuario.rut = '".$id."'          
          
          ";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }      
    
 //======= ACTUALIZAR USUARIO=========  
 public function actualizar_usuario($primer_nombre, $segundo_nombre, $primer_apellido , $segundo_apellido, $correo,
            $celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion) 
     {
               require_once '../modell/madmin.php';
        try {
            $lista = new funciones_BD();
            $list = $lista->actualizar_usuario($primer_nombre, $segundo_nombre, $primer_apellido , $segundo_apellido, $correo,
            $celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion);
            
            if ($lista) {
                return true;
                
            } else {
                return false;
            }
        } 
         
         catch (Exception $e) {
         echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
        }
     }
    
   //======= ELIMINAR USUARIO=========  
 public function eliminar_usuario($rut) 
     {
               require_once '../modell/madmin.php';
        try {
            $lista = new funciones_BD();
            $list = $lista->eliminar_usuario($rut);
            
            if ($lista) {
                return true;
                
            } else {
                return false;
            }
        } 
         
         catch (Exception $e) {
         echo "<script>alert('ERROR AL ELIMINAR');</script>";
        }
     }  
    
    
    
    
//==================== INSERTAR INSTITUCION ===========================  
    
     public function ingresar_institucion($institucion, $monitor)
     { 
           require_once '../modell/madmin.php';

        try {
            $lista = new funciones_BD();
            $list = $lista->ingresar_institucion($institucion, $monitor);
            
            if ($lista) {
                return true;
            } else {
                
                return false;
            }
        } 
         
         catch (Exception $e) {
         echo "<script>alert('ERROR AL INGRESAR USUARIO NIVEL 1');</script>";
        }
    } 
    
    
     //======= ACTUALIZAR INSTITUCION=========  
 public function actualizar_ins($id_institucion, $institucion, $monitor) 
     {
               require_once '../modell/madmin.php';
        try {
            $lista = new funciones_BD();
            $list = $lista->actualizar_ins($id_institucion, $institucion, $monitor);
            
            if ($lista) {
                return true;
                
            } else {
                return false;
            }
        } 
         
         catch (Exception $e) {
         echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
        }
     }
    
    
//======= ELIMINAR INSTITUCION=========  
 public function eliminar_ins($id_institucion) 
     {
               require_once '../modell/madmin.php';
        try {
            $lista = new funciones_BD();
            $list = $lista->eliminar_ins($id_institucion);
            
            if ($lista) {
                return true;
                
            } else {
                return false;
            }
        } 
         
         catch (Exception $e) {
         echo "<script>alert('ERROR AL ELIMINAR');</script>";
        }
     }
    
       //==================== listado usuarios  ===========================
    public function lista_usuario_inst($id_institucion) {
        $sql = "select usuario.primer_nombre, usuario.primer_apellido, usuario.id_perfil, perfil.perfil, usuario.id_institucion,
          usuario.segundo_nombre, usuario.segundo_apellido, usuario.correo, usuario.celular, usuario.fijo,
          usuario.id_institucion, usuario.id_comuna, institucion.institucion, comuna.comuna, provincia.provincia, 
          region.region, usuario.rut , usuario.estado
           
          from usuario  
          
          inner join perfil on usuario.id_perfil = perfil.id_perfil
          inner join institucion on usuario.id_institucion = institucion.id_institucion
          inner join comuna on usuario.id_comuna = comuna.id_comuna
          inner join provincia on comuna.id_provincia = provincia.id_provincia
          inner join region on provincia.id_region = region.id_region 
          where usuario.estado = 1 and usuario.id_institucion = '".$id_institucion."' and usuario.id_perfil = '3'";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }   
    
     //======= ACTUALIZAR USUARIO DE INSITTUCION DETERMINADA=========  
 public function actualizar_usuario_ins($primer_nombre, $segundo_nombre, $primer_apellido , $segundo_apellido, $correo,
            $celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion) 
     {
               require_once '../modell/madmin.php';
        try {
            $lista = new funciones_BD();
            $list = $lista->actualizar_usuario_ins($primer_nombre, $segundo_nombre, $primer_apellido , $segundo_apellido, $correo,
            $celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion);
            
            if ($lista) {
                return true;
                
            } else {
                return false;
            }
        } 
         
         catch (Exception $e) {
         echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
        }
     }
    
   //==================== listado de nacionalidades ==========================
    public function lista_nacionalidad() {        
        $sql = "select id, CONCAT(nombre, ' - ', iso3166a2) As nombre, iso3166a2 from `nacionalidad` order by nombre asc";
            
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
    }     
  
    
    //==================== listado de estados de delincuente==========================
    public function lista_estado_delincunete() {        
        $sql = "select id_estado_delincuente as id, CONCAT(estado_delincuente,' - Codigo: ',codigo) as nombre from `estado_delincuente` order by estado_delincuente asc";
            
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
    }   
    
//genera un nuevo delincuente    
    public function nuevo_delincuente($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $celular, $fijo, $rut, $comuna, $nacionalidad, $direccion, $genero, $id_estado_delincuente,  $ingresar, $apado){
        
        require_once '../modell/madmin.php';
        try {
            $lista = new funciones_BD();
            $list = $lista->nuevo_delincuente($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $celular, $fijo, $rut, $comuna, $nacionalidad, $direccion, $genero, $id_estado_delincuente,  $ingresar, $apado);
            
            if ($lista){
                return true;

            } else           {
                return false;
            }
          } 

         catch (Exception $e) {
         echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
        }
    }
    
    
}
?>