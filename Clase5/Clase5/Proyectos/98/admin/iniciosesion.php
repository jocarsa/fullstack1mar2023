<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
    session_start();
    echo "El usuario que has enviado es: ".$_POST['usuario'];
    echo "<br>";
    echo "La contraseña que has enviado es: ".$_POST['contrasena'];

    include "../config.php";

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
        echo '<script>window.location = "panel.php"</script>';
    }else{
        echo "El usuario NO existe";
        header('Location: index.html');
    }

?>