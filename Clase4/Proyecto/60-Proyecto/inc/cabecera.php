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
                        <a href="acercade.php">
                            Acerca de
                        </a>
                    </li>
                    <li>
                        <a href="contacto.php">
                            Contacto
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>