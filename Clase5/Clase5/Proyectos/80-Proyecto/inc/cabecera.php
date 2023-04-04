<?php session_start(); ?>
<?php
include "inc/config.php";
include "inc/funciones.php";
if(!isset($_SESSION['carrito'])){$_SESSION['carrito'] = [];}
?>
<!-- Proyecto web (c) 2023 Jose Vicente Carratala -->
<!doctype html>
<html lang="es">
    <head>
        <title>Proyecto web</title>
        <meta charset="utf-8">
        <link rel="Stylesheet" href="css/estilo.css">
    </head>
    <body>
        <header>
            <img src="img/logo.png" alt="Logo">
            <h1>Tienda online</h1>
            <h2>Artículos deportivos</h2>
            <nav>
                <ul>
                    <li>
                        <a href="index.php">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="productos.php">
                            Productos
                        </a>
                    </li>
                    <li>
                        <a href="blog.php">
                            Blog
                        </a>
                    </li>
                    <?php
                    
                        // Me conecto a la base de datos
                        $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

                        // Configuro la conexión en utf8
                        mysqli_set_charset($conexion, "utf8mb4");

                        // Preparo una petición a la base de datos
                        $peticion = "
                        SELECT * 
                        FROM paginas
                        ";

                        // Guardo la petición en un array
                        $resultado = mysqli_query($conexion, $peticion);
                        // Repaso el array y lo devuelvo por pantalla
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo '
                                <li>
                                    <a href="index.php?p='.$fila['Identificador'].'">
                                        '.$fila['titulo'].'
                                    </a>
                                </li>
                            ';
                        }
                    ?>
                    
                    <li>
                        <a href="contacto.php">
                            Contacto
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>