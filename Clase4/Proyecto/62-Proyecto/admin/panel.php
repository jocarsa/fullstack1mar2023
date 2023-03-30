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
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
                                mysqli_set_charset($conexion, "utf8mb4");
                                $peticion = "
                                SELECT * FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."
                                ";
                                $resultado = mysqli_query($conexion, $peticion);
                                echo "<form action='?operacion=procesaactualizar&tabla=".$_GET['tabla']."' method='POST'>";
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
                            case "procesaactualizar":
                                echo "Vamos a ver qué viene por POST<br>";
                                //var_dump($_POST);
                                $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
                                mysqli_set_charset($conexion, "utf8mb4");
                                $peticion = "UPDATE ";
                                $peticion .= $_GET['tabla'];
                                $peticion .= " SET ";
                                foreach($_POST as $clave=>$valor){
                                    $peticion .= $clave."='".$valor."',";
                                }
                                $peticion = substr_replace($peticion ,"", -1);
                                $peticion .= " WHERE Identificador = ".$_POST['Identificador'].";";
                                echo $peticion;
                                mysqli_query($conexion, $peticion);
                                echo "<p>Registro actualizado correctamente</p>";
                                echo "<p>Redirigiendo en 5 segundos...</p>";
                                echo '<meta http-equiv="Refresh" content="5; url=?tabla='.$_GET['tabla'].'" />';
                                break;
                        }
                    } 
                ?>
            </section>
<?php include "inc/piedepagina.php" ?>        