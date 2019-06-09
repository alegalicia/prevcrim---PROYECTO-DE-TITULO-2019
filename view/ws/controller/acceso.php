<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "prevcrim";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT COUNT(usuario.id_perfil) as licencia,perfil.perfil 
            FROM `usuario`
            inner join perfil on usuario.id_perfil = perfil.id_perfil 
            where usuario.estado = 1 
            GROUP by perfil.perfil";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
    $id=$row['licencia'];
    $nombre=$row['perfil'];
    

    $clientes[] = array('licencia'=> $id, 'perfil'=> $nombre);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'clientes.json';
file_put_contents($file, $json_string);
*/
   
?>