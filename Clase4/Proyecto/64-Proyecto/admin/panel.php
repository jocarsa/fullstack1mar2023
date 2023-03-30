<?php
    include "inc/funciones.php";
    include "inc/cabecera.php";
?>
            <nav>
                <ul>
                    <?php
                        menuNavegacion();
                    ?> 
                </ul>
            </nav>
            <section>
                <a href="?operacion=crear&tabla=<?php echo $_GET['tabla']?>">
                    <button>
                        Nuevo registro
                    </button>
                </a>
                <?php 
                    if(!isset($_GET['operacion'])){
                        include "inc/tabla.php";
                    }else{
                        switch($_GET['operacion']){
                            case "ver":
                                visualizarRegistro();
                                break;
                            case "actualizar":
                                actualizaRegistro();
                                break;
                            case "eliminar":
                                eliminarRegistro();
                                break;
                            case "procesaactualizar":
                                procesaActualizar();
                                break;
                            case "crear":
                                echo "<h3>Actualización de registros</h3>";
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
                                mysqli_set_charset($conexion, "utf8mb4");
                                $peticion = "
                                SHOW COLUMNS FROM ".$_GET['tabla']."
                                ";
                                $resultado = mysqli_query($conexion, $peticion);
                                echo "<form action='?operacion=procesacrear&tabla=".$_GET['tabla']."' method='POST'>";
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<h5>".$fila['Field']."</h5><input type='text' name='".$fila['Field']."' ><br><br><br>";
                                }
                                echo "<input type='submit'>";
                                echo "</form>";
                                break;
                            case "procesacrear":
                                echo "Vamos a ver qué viene por POST<br>";
                                //var_dump($_POST);
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
                                mysqli_set_charset($conexion, "utf8mb4");
                                $peticion = "INSERT INTO ";
                                $peticion .= $_GET['tabla'];
                                $peticion .= " VALUES(NULL, ";
                                $contador = 0;
                                foreach($_POST as $clave=>$valor){
                                    if($contador != 0){
                                        $peticion .= "'".$valor."',";
                                    }
                                    $contador++;
                                }
                                $peticion = substr_replace($peticion ,"", -1);
                                $peticion .= ")";
                                echo $peticion;
                                mysqli_query($conexion, $peticion);
                                echo "<p>Registro creado correctamente</p>";
                                echo "<p>Redirigiendo en 5 segundos...</p>";
                                echo '<meta http-equiv="Refresh" content="5; url=?tabla='.$_GET['tabla'].'" />';
                                break;
                        }
                    } 
                ?>
            </section>
<?php include "inc/piedepagina.php" ?>        