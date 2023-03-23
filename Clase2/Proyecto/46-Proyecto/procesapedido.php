<?php

//////////////////// Primero guardo el cliente
// Me conecto a la base de datos
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

    // Configuro la conexión en utf8
    mysqli_set_charset($conexion, "utf8mb4");

    // Preparo una petición a la base de datos
    $peticion = "
    INSERT INTO clientes
    VALUES (
        NULL,
        '".$_POST['usuario']."',
        '".$_POST['contrasena']."',
        '".$_POST['nombre']."',
        '".$_POST['apellidos']."',
        '".$_POST['email']."',
        '".$_POST['vat']."',
        '".$_POST['direccion']."',
        '".$_POST['localidad']."',
        '".$_POST['cp']."',
        '".$_POST['pais']."'
    )
    ";

    // Guardo la petición en un array
    $resultado = mysqli_query($conexion, $peticion);

    
?>