<?php include "inc/cabecera.php";?>
            <?php if(isset($_GET['p'])){
                cargaPagina();
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