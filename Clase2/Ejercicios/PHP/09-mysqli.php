<?php

// Me conecto a la base de datos
$conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

// Configuro la conexión en utf8
mysqli_set_charset($conexion, "utf8mb4");

// Preparo una petición a la base de datos
$peticion = "SELECT * FROM usuarios";

// Guardo la petición en un array
$resultado = mysqli_query($conexion, $peticion);

// Repaso el array y lo devuelvo por pantalla
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo $fila['nombre']." - ".$fila['apellidos']."<br>";
}