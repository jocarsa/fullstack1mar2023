        </main>
        <footer>
            <h6>(c) 2023 Jose Vicente Carratalá Sanchis</h6>
            <section id="carrito">
                <h3>Carrito</h3>
                <table id="tablacarrito">
                    <thead>
                        <tr>
                            <th>Unidades</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                            for($i = 0;$i<count($_SESSION['carrito']);$i++){
                                // Me conecto a la base de datos
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

                                // Configuro la conexión en utf8
                                mysqli_set_charset($conexion, "utf8mb4");

                                // Preparo una petición a la base de datos
                                $peticion = "
                                SELECT * 
                                FROM productos
                                WHERE Identificador = '".$_SESSION['carrito'][$i][0]."'
                                ";

                                // Guardo la petición en un array
                                $resultado = mysqli_query($conexion, $peticion);
                                // Repaso el array y lo devuelvo por pantalla
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    $nombre = $fila['nombre'];
                                    $precio = $fila['precio'];
                                }
                                echo '
                                    <tr>
                                        <td class="unidades">'.$_SESSION['carrito'][$i][1].'</td>
                                        <td class="nombre">'.$nombre.'</td>
                                        <td class="precio">'.$precio.'</td>
                                        <td class="subtotal">'.($_SESSION['carrito'][$i][1]*$precio).'</td>
                                    </tr>
                                ';
                                $total += ($_SESSION['carrito'][$i][1]*$precio);
                            }
                        ?>
                        <tr>
                            <td colspan="3"> Total</td>
                            <td class="total"><?php echo $total;?></td>
                        </tr>
                        
                    </tbody>
                    
                </table>
                <a href="datosdecliente"><button>Pagar</button></a>
                
            </section>
        </footer>
    </body>
</html>