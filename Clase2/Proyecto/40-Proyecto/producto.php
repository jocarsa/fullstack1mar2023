<?php include "inc/cabecera.php";?>
<section id="producto">
<h3>Página de producto</h3>
<?php
                

                    // Preparo una petición a la base de datos
                    $peticion = "
                    SELECT * 
                    FROM productos
                    WHERE Identificador = ".base64_decode($_GET['idproducto'])."
                    ";

                    // Guardo la petición en un array
                    $resultado = mysqli_query($conexion, $peticion);
                    // Repaso el array y lo devuelvo por pantalla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo '
                            <article>
                                <img src="photo/'.$fila['imagen'].'" alt="Producto">
                                <h3>'.$fila['nombre'].'</h3>
                                <h5>Descripción</h5>
                                <p>'.$fila['descripcion'].'</p>
                                <h5>Precio</h5>
                                <p>'.$fila['precio'].'€</p>
                                <h5>Existencias</h5>
                                <p>'.$fila['existencias'].'u.</p>
                                <h4>Compra</h4>
                                <h5>Unidades</h5>
                                <form action="anadepedido.php" method="POST">
                                <input type="hidden" name="idproducto" value="'.base64_decode($_GET['idproducto']).'">
                                <input type="number" name="unidades">
                                <input type="submit">
                                </form>
                            </article>
                        ';
                    }

                
                ?>
    </section>
<div class="clearfix"></div>
    <aside>
        <h4>Otros productos que te pueden interesar:</h4>
        <?php
                


                    // Preparo una petición a la base de datos
                    $peticion = "
                    SELECT * 
                    FROM productos
                    
                    ";

                    // Guardo la petición en un array
                    $resultado = mysqli_query($conexion, $peticion);
                    // Repaso el array y lo devuelvo por pantalla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo '
                            <article>
                                <img src="photo/'.$fila['imagen'].'" alt="Producto">
                                <h3>'.$fila['nombre'].'</h3>
                                <p>'.$fila['descripcion'].'</p>
                                
                                <a href="producto.php?idproducto='.$fila['Identificador'].'">
                                <button>Comprar</button>
                                </a>
                            </article>
                        ';
                    }

                
                ?>
    </aside>
<?php include "inc/piedepagina.php";?>