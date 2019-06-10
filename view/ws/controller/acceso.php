<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "prevcrim";

/*
$server = "localhost";
$user = "id9895401_prevcrim";
$pass = "flaco752";
$bd = "id9895401_prevcrim";
*/


//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


$opcion   = $_REQUEST['opcion'];
$token   = trim($_REQUEST['token']);


switch ($opcion) {
    
//contador de licencias    
    case 'licencia':

                    if($token == "123"){

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

                    }
                    else {
                        $resultado= array("TOCKEN INCORRECTO");
                        echo json_encode($resultado);
                    }
        break;
    
//API contador de visitas
        case 'controlGoogle':

        if($token == "123"){

            //generamos la consulta
            $sql = "SELECT sum(cantidad) as total, MONTH(fecha) as mes 
            FROM `google`
            GROUP by MONTH(fecha)";
            mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

            if(!$result = mysqli_query($conexion, $sql)) die();

            $clientes = array(); //creamos un array

            while($row = mysqli_fetch_array($result)) 
                { 
                    $id=$row['total'];
                    $nombre=$row['mes'];
                    $clientes[] = array('consultas'=> $id, 'mes'=> $nombre);
                }

            //desconectamos la base de datos
            $close = mysqli_close($conexion) 
            or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

            //Creamos el JSON
            $json_string = json_encode($clientes);
            echo $json_string;

        }
            else {
                $resultado= array("TOCKEN INCORRECTO");
                echo json_encode($resultado);
            }
break;


   
case 'contrato':

if($token == "123"){

    //generamos la consulta
    $sql = "SELECT licencia, cliente, tipo, fecha_inicio, fecha_fin FROM `licencia`";
    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

    if(!$result = mysqli_query($conexion, $sql)) die();

    $clientes = array(); //creamos un array

    while($row = mysqli_fetch_array($result)) 
        { 
            $licencia=$row['licencia'];
            $cliente=$row['cliente'];
            $tipo=$row['tipo'];
            $fecha_inicio=$row['fecha_inicio'];
            $fecha_fin=$row['fecha_fin'];

            $clientes[] = array('licencia'=> $licencia, 'cliente'=> $cliente, 
            'tipo'=> $tipo, 'fecha_inicio' => $fecha_inicio, 'fecha_fin'=> $fecha_fin);
            
        }

    //desconectamos la base de datos
    $close = mysqli_close($conexion) 
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    //Creamos el JSON
    $json_string = json_encode($clientes);
    echo $json_string;

    }
    else {
        $resultado= array("TOCKEN INCORRECTO");
        echo json_encode($resultado);
    }
break;

    default:
            $resultado= array("TOCKEN INCORRECTO");
            echo json_encode($resultado);
        break;
}



//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'clientes.json';
file_put_contents($file, $json_string);
*/
   
?>