<?php

    function menuNavegacion(){
        // Me conecto a la base de datos
                    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

                    // Configuro la conexión en utf8
                    mysqli_set_charset($conexion, "utf8mb4");

                    // Preparo una petición a la base de datos
                    $peticion = "
                    SHOW TABLES
                    ";

                    // Guardo la petición en un array
                    $resultado = mysqli_query($conexion, $peticion);
                    // Repaso el array y lo devuelvo por pantalla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                       
                            echo '
                                <li>
                                    <a href="?tabla='.$fila['Tables_in_aplicacionweb'].'">'.$fila['Tables_in_aplicacionweb'].'</a>
                                </li>
                            ';
                    }
    }

?>