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
            <p>Hola, <?php echo $_SESSION['usuario']?></p>
            <a href="cerrarsesion.php">Cerrar sesion</a>
        </header>
        <main>
            <nav>
                <ul>
                    <?php
                    
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
                    ?>
                    
                    
                </ul>
            </nav>
            <section>
                <h3>Contenido de la tabla de productos</h3>
                <table>
                    <thead>
                        <tr>
                            <?php
                    
                                // Me conecto a la base de datos
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

                                // Configuro la conexión en utf8
                                mysqli_set_charset($conexion, "utf8mb4");

                                // Preparo una petición a la base de datos
                                $peticion = "
                                SHOW COLUMNS FROM ".$_GET['tabla']."
                                ";
                            echo $peticion;

                                // Guardo la petición en un array
                                $resultado = mysqli_query($conexion, $peticion);
                                // Repaso el array y lo devuelvo por pantalla
                                while ($fila = mysqli_fetch_assoc($resultado)) {

                                        echo '
                                            <th>'.$fila['Field'].'</th>
                                        ';
                                }
                                ?>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </section>
        </main>
        <footer>
        </footer>
    </body>
</html>