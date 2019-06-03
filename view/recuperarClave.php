<?php 

$correo="recupera";
if($correo=="recupera")
{
$destinatario = "alegalicia@gmail.com"; 
$asunto = "Este mensaje es de prueba"; 
$cuerpo =' 
<html> 
<head> 
   <title> Prueba de correo</title> 
</head> 
<body> 
<h1>Activar Correo</h1> 

Codigo de activación: 

</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Miguel Angel Alvarez <alegalicia@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To:m\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: \r\n"; 

//direcciones que recibián copia 
$headers .= "Cc: \r\n"; 

//direcciones que recibirán copia oculta 
$headers .= "Bcc: \r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);
echo $cuerpo;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <label><?php echo $codigo = md5(time()); ?></label>
</body>
</html>