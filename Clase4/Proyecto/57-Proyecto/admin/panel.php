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
                                break;
                            case "actualizar":
                                echo "<h3>Actualización de registros</h3>";
                                break;
                            case "eliminar":
                                echo "<h3>Eliminación de registros</h3>";
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
                                $peticion = "
                                DELETE FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."
                                ";
                                mysqli_query($conexion, $peticion);
                                echo "<p>Registro borrado correctamente</p>";
                                echo "<p>Redirigiendo en 5 segundos...</p>";
                                echo '<meta http-equiv="Refresh" content="5; url=?tabla='.$_GET['tabla'].'" />';
                                break;
                        }
                    } 
                ?>
            </section>
<?php include "inc/piedepagina.php" ?>        