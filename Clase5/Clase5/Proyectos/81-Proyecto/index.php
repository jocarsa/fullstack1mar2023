<?php include "inc/cabecera.php";?>
            <?php if(isset($_GET['p'])){
                // Me conecto a la base de datos
                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

                // Configuro la conexión en utf8
                mysqli_set_charset($conexion, "utf8mb4");

                // Preparo una petición a la base de datos
                $peticion = "
                SELECT * 
                FROM paginas
                WHERE Identificador = ".$_GET['p']."
                ";

                // Guardo la petición en un array
                $resultado = mysqli_query($conexion, $peticion);
                // Repaso el array y lo devuelvo por pantalla
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo '
                        <h3>'.$fila['titulo'].'</h3>
                        <p>'.$fila['texto'].'</p>
                    ';
                }
            }else{?>
            <section id="banner">
                <h4>Banner</h4>
                <img src="img/banner.jpg" alt="Banner">
            </section>
            <section id="destacados">
                <h4>Destacados</h4>
                <article>
                    <img src="img/icono1.jpg" alt="Destacado">
                    <h3>Deporte</h3>
                    <p>Selección de bicicletas de paseo y de montaña, aptas para cualquier terreno</p>
                </article>
                <article>
                    <img src="img/icono2.jpg" alt="Destacado">
                    <h3>Gimnasio</h3>
                    <p>Artículos para el desarrollo físico del deportista</p>
                </article>
                <article>
                    <img src="img/icono3.jpg" alt="Destacado">
                    <h3>Ropa deportiva</h3>
                    <p>Toda la ropa que necesites para realizar tu actividad favorita</p>
                </article>
            </section>
            <section id="productos">
                <h4>Productos</h4>
                <?php
                    productosPaginaPrincipal();
                ?>
                
                
            </section>
        <?php } ?>
<?php include "inc/piedepagina.php";?>        