<?php
    include "config.php";
    global $conexion;

    // Configuro la conexión en utf8
    mysqli_set_charset($conexion, "utf8mb4");

    // Preparo una petición a la base de datos
    $peticion = "
    INSERT INTO contacto
    VALUES
    (NULL,
    '".date('U')."',
    '".$_POST['nombre']."',
    '".$_POST['email']."',
    '".$_POST['asunto']."',
    '".$_POST['mensaje']."')
    ";

    // Guardo la petición en un array
    $resultado = mysqli_query($conexion, $peticion);
    
    // Varios destinatarios
$para  = 'info@josevicentecarratala.com'; // atención a la coma

// título
$titulo = 'Mensaje desde la web de JOCARSA: '.$_POST['asunto'];

// mensaje
$mensaje = $_POST['mensaje'];

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Jose Vicente <info@josevicentecarratala.com>' . "\r\n";
$cabeceras .= 'From:  <'.$_POST['email'].'>' . "\r\n";

// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);

    header("Location:index.php");
?>