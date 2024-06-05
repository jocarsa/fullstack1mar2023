<?php
// Me conecto a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
// Configuro la conexión en utf8
mysqli_set_charset($conexion, "utf8mb4");
?>