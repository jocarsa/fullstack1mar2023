<?php include "inc/cabecera.php";?>
<h3>Página de producto</h3>
<?php
                
                    // Me conecto a la base de datos
                    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

                    // Configuro la conexión en utf8
                    mysqli_set_charset($conexion, "utf8mb4");

                    // Preparo una petición a la base de datos
                    $peticion = "
                    SELECT * 
                    FROM productos
                    WHERE Identificador = ".$_GET['idproducto']."
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
<?php include "inc/piedepagina.php";?>