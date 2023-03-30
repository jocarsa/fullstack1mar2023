<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    die("Te has intentado colar");
}
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Panel de control</title>
        <meta charset="utf-8">
        <link rel="Stylesheet" href="css/estilo.css">
    </head>
    <body>
        <header>
            <img src="../img/logo.png" alt="logo">
            <h1>Panel de control</h1>
            <div id="datosusuario">
                <p>Hola, <?php echo $_SESSION['usuario']?></p>
                <a href="cerrarsesion.php">Cerrar sesion</a>
            </div>
        </header>
        <main>