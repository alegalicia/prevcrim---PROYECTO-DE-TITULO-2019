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
    
    //==================== listado delincuente  ===========================
    public function lista_delincuente () 
     {
            $sql = "select delincuente.rut, delincuente.primer_nombre, delincuente.segundo_nombre, delincuente.primer_apellido, delincuente.segundo_apellido,
            nacionalidad.nombre, estado_delincuente.estado_delincuente, comuna.comuna, provincia.provincia, region.region 
            from `delincuente` 
            inner join estado_delincuente on delincuente.id_estado_delincuente = estado_delincuente.id_estado_delincuente 
            inner join nacionalidad on delincuente.id_nacionalidad = nacionalidad.id 
            inner join comuna on delincuente.id_comuna = comuna.id_comuna 
            inner join provincia on comuna.id_provincia = provincia.id_provincia 
            inner join region on provincia.id_region = region.id_region 
            where delincuente.estado = 1 
            order by delincuente.rut desc";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }   
    
    
 //==================== listado delitos  ===========================
    public function lista_delitos() 
     {
            $sql = "select id_delito, delito, descripcion FROM `delito` where estado= 1";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }     
    
    
 //genera un nuevo delito delincunte   
    public function nuevo_delito_delincuente($rut, $comuna, $direccion, $fecha, $hora, $descpcion, $delito, $tipo){
        
        require_once '../modell/madmin.php';
        try {
            $lista = new funciones_BD();
            $list = $lista->nuevo_delito_delincuente($rut, $comuna, $direccion, $fecha, $hora, $descpcion, $delito, $tipo);
            
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
    
     //==================== buscar delitos delincuente  ===========================
    public function buscar_delito_delincuente($rut) {
        $sql = "SELECT delito_delincuente.fecha, delito_delincuente.hora, delito.delito, comuna.comuna, delito_delincuente.id_delincuente, delito_delincuente.tipo 
                FROM `delito_delincuente` 
                inner join delito on delito_delincuente.id_delito = delito.id_delito 
                inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna 
                WHERE delito_delincuente.estado = 1 and delito_delincuente.id_delincuente ='".$rut."' 
                order by delito_delincuente.fecha desc
          ";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }   
    
    
  //==================== listado delitos  ===========================
    public function cuenta_cantida_delitos($rut) 
     {
            $sql = "SELECT COUNT(tipo)as delito FROM `delito_delincuente`
                    where tipo = 'delito' and delito_delincuente.id_delincuente = '".$rut."'
                    GROUP by tipo";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }     
    
    
   //==================== listado delitos  ===========================
    public function cuenta_cantida_contorl($rut) 
     {
            $sql = "SELECT COUNT(tipo)as control FROM `delito_delincuente`
                    where tipo = 'control' and delito_delincuente.id_delincuente = '".$rut."'
                    GROUP by tipo";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }       

//==================== listado de comunas - provincia - region ===========================
    public function lista_comuna_prov_reg() {
        $sql = "select comuna.id_comuna, comuna.comuna, provincia.provincia, region.region from `comuna` 
                inner join provincia on comuna.id_provincia = provincia.id_provincia 
                inner join region on provincia.id_region = region.id_region 
                order by comuna asc";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }  
    
    
 //==================== listado de comunas - delitos ===========================
    public function reporte_comuna_delito($comuna) {
        $sql = "SELECT delito_delincuente.id_delincuente,  delito_delincuente.descripcion, delito_delincuente.fecha, delito_delincuente.hora, delito_delincuente.tipo, 
        comuna.comuna, delincuente.rut, delincuente.primer_nombre, delincuente.primer_apellido, delito.delito 
        from `delito_delincuente` 
        inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna 
        inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut 
        inner join delito on delito_delincuente.id_delito = delito.id_delito  
        where delito_delincuente.id_comuna = '".$comuna."'";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }    
    
    
    
//==================== listado dlitos por comuna ===========================
    public function cuenta_comuna_delitos($comuna) 
     {
            $sql = "SELECT COUNT(tipo)as delito FROM `delito_delincuente`
                    where tipo = 'delito' and delito_delincuente.id_comuna = '".$comuna."'
                    GROUP by tipo";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }     
    
    
   //==================== listado comuna delitos  ===========================
    public function cuenta_comuna_contorl($comuna) 
     {
            $sql = "SELECT COUNT(tipo)as control FROM `delito_delincuente`
                    where tipo = 'control' and delito_delincuente.id_comuna = '".$comuna."'
                    GROUP by tipo";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }    

    
//==================== listado comuna delitos  ===========================
    public function cuenta_comuna_mxa5($comuna) 
     {
            $sql = "select delito_delincuente.id_delincuente,  delito_delincuente.descripcion, delito_delincuente.fecha, delito_delincuente.hora, delito_delincuente.tipo,
            comuna.comuna, delincuente.rut, delincuente.primer_nombre, delincuente.primer_apellido, delito.delito, count(delito_delincuente.id_delito) as total 
            from `delito_delincuente` 
            inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna 
            inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut 
            inner join delito on delito_delincuente.id_delito = delito.id_delito
            where delito_delincuente.id_comuna = '".$comuna."' 
            GROUP by delito_delincuente.id_delito 
            ORDER by total desc  
            limit 5";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }      
    
    
 //==================== listado delicuentes  ===========================
    public function top_delincuentes($comuna) 
     {
            $sql = "select delito_delincuente.id_delincuente,  delito_delincuente.descripcion, delito_delincuente.fecha, delito_delincuente.hora, delito_delincuente.tipo, comuna.comuna, delincuente.rut, delincuente.primer_nombre, delincuente.primer_apellido, delito.delito, count(delito_delincuente.id_delincuente) as total 
            from `delito_delincuente` 
            inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna 
            inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut 
            inner join delito on delito_delincuente.id_delito = delito.id_delito
            where delito_delincuente.id_comuna = '".$comuna."'  
            GROUP by delito_delincuente.id_delincuente  
            ORDER by total desc  
            limit 5";
        
        $stmt = $this->db->connect()->query($sql);
        $datos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[] = array_map("utf8_encode", $fila);
            // $datos[] =  $fila;
        }
        return $datos;
        
    }      
}
?>