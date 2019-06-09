<?php
class function_licencia
{
    function __construct(){
        require_once '../connect/connect.php';
        $this->db = new conexion();
    }
    public function licencia_admin()
    {
        $stmt = $this->db->connect()->query('SELECT COUNT(usuario.id_perfil) as licencia,perfil.perfil 
                                            FROM `usuario`
                                            inner join perfil on usuario.id_perfil = perfil.id_perfil 
                                            where usuario.estado = 1 
                                            GROUP by perfil.perfil');
        
        $datos =array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $datos[] = $fila;
        }
        return $datos;
    
    }

    /*
    public function ingresar_bodega($id_moneda,$unidades,$id_username)
    {
        $sql_estado = $this->db->connect()->exec("insert into bodega  (id_moneda,unidades,id_username,estado)
        values
        (
         '".$id_moneda."',
         '".$unidades."',
         '".$id_username."',
         1
        )");
        
        if($sql_estado)
        {
            return true;
        }else
        {
            return false;
        }
    }
     public function actualizar_bodega($id_bodega,$id_moneda,$unidades,$id_username)
    {
        $sql_estado = $this->db->connect()->exec("update bodega  set id_moneda = '".$id_moneda."',unidades = '".$unidades."',id_username = '".$id_username."'  where id_bodega = '".$id_bodega."'");
        
        if($sql_estado)
        {
            return true;
        }else
        {
            return false;
        }
    }
  */
}
?>