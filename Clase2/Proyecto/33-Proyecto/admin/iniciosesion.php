<?php

    echo "El usuario que has enviado es: ".$_POST['usuario'];
    echo "<br>";
    echo "La contraseña que has enviado es: ".$_POST['contrasena'];

    // Me conecto a la base de datos
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

    // Configuro la conexión en utf8
    mysqli_set_charset($conexion, "utf8mb4");

    // Preparo una petición a la base de datos
    $peticion = "
    SELECT * 
    FROM usuarios
    WHERE
    usuario = '".$_POST['usuario']."'
    AND
    contrasena = '".sha1($_POST['contrasena'])."'
    ";

    // Guardo la petición en un array
    $resultado = mysqli_query($conexion, $peticion);
    echo "<br>";
    // Repaso el array y lo devuelvo por pantalla
    if ($fila = mysqli_fetch_assoc($resultado)) {
        echo "El usuario existe";
    }else{
        echo "El usuario NO existe";
    }

?>