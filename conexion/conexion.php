<?php
class conexion {
  private $db;
    public function connect(){
        require_once '../config.php';
        
        $dsn = DB_HOST;
		$usuario = DB_USER;
		$contraseña = DB_PASSWORD;

		try 
		{
			$db = new PDO($dsn, $usuario, $contraseña);
			return $db;
		} catch (PDOException $e) 
		{
			echo 'Falló la conexión: ' . $e->getMessage();
		}
    }
}

?>