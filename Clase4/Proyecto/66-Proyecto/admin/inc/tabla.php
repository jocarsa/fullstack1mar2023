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
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                                // Me conecto a la base de datos
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

                                // Configuro la conexión en utf8
                                mysqli_set_charset($conexion, "utf8mb4");

                                // Preparo una petición a la base de datos
                                $peticion = "
                                SELECT * FROM ".$_GET['tabla']."
                                ";
                                echo $peticion;
                                echo "<br>";
                                // Guardo la petición en un array
                                $resultado = mysqli_query($conexion, $peticion);
                                // Repaso el array y lo devuelvo por pantalla
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                        
                                        foreach ($fila as $clave=>$valor) {
                                            
                                                if(strpos($clave, "FK") !== false){
                                                    echo "<td>Clave foranea</td>";
                                                }else{
                                                    echo "<td>".$valor."</td>";
                                                }
                                                
                                            
                                           
                                        }
                                    echo "<td>
                                        <a href='?operacion=ver&tabla=".$_GET['tabla']."&id=".$fila['Identificador']."'><button>Ver</button></a>
                                        <a href='?operacion=actualizar&tabla=".$_GET['tabla']."&id=".$fila['Identificador']."'><button>Actualizar</button></a>
                                        <a href='?operacion=eliminar&tabla=".$_GET['tabla']."&id=".$fila['Identificador']."'><button>Eliminar</button></a>
                                    </td>";
                                    echo "</tr>";
                                }
                                ?>
                    </tbody>
                </table>