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
                <?php 
                    if(!isset($_GET['operacion'])){
                        include "inc/tabla.php";
                    }else{
                        switch($_GET['operacion']){
                            case "ver":
                                visualizarRegistro();
                                break;
                            case "actualizar":
                                echo "<h3>Actualización de registros</h3>";
                                echo "<h3>Visualización de registros</h3>";
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
                                mysqli_set_charset($conexion, "utf8mb4");
                                $peticion = "
                                SELECT * FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."
                                ";
                                $resultado = mysqli_query($conexion, $peticion);
                                echo "<form action='procesaactualizar.php' method='POST'>";
                                while ($fila = mysqli_fetch_assoc($resultado)) {

                                    foreach($fila as $clave=>$valor){
                                        echo "<h5>".$clave."</h5><input type='text' name='".$clave."' value='".$valor."'><br><br><br>";
                                    }
                                }
                                echo "<input type='submit'>";
                                echo "</form>";
                                break;
                            case "eliminar":
                                eliminarRegistro();
                                break;
                        }
                    } 
                ?>
            </section>
<?php include "inc/piedepagina.php" ?>        