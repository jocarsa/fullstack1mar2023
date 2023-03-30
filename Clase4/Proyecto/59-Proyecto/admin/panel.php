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
                                echo "<h3>Visualización de registros</h3>";
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
                                mysqli_set_charset($conexion, "utf8mb4");
                                $peticion = "
                                SELECT * FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."
                                ";
                                $resultado = mysqli_query($conexion, $peticion);
                                while ($fila = mysqli_fetch_assoc($resultado)) {

                                    foreach($fila as $clave=>$valor){
                                        echo "<h4>".$clave."</h4><p>".$valor."</p><br>";
                                    }
                                }
                                break;
                            case "actualizar":
                                echo "<h3>Actualización de registros</h3>";
                                break;
                            case "eliminar":
                                eliminarRegistro();
                                break;
                        }
                    } 
                ?>
            </section>
<?php include "inc/piedepagina.php" ?>        