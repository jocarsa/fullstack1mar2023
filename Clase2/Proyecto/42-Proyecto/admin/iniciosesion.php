<?php
    session_start();
    echo "El usuario que has enviado es: ".$_POST['usuario'];
    echo "<br>";
    echo "La contraseña que has enviado es: ".$_POST['contrasena'];

    include "../inc/config.php"

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
        // Te doy la llave de entrada
        $_SESSION['usuario'] = $fila['usuario'];
        // Te llevo al panel de control
        header('Location: panel.php');
    }else{
        echo "El usuario NO existe";
        header('Location: index.html');
    }

?>