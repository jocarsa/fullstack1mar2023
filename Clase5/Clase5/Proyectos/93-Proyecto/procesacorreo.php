<?php

    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

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
    header("Location:index.php");
?>