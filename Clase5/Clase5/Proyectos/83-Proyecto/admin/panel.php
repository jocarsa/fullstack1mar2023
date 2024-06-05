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
                        if(isset($_GET['tabla'])){
                            echo '
                            <a href="?operacion=crear&tabla='.$_GET['tabla'].'">
                                <button class="crear">
                                    Nuevo registro
                                </button>
                            </a>';
                            include "inc/tabla.php";
                        }else{
                            
                            echo "Te voy a mostrar el escritorio";
                        }
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
                                crear();
                                break;
                            case "procesacrear":
                                procesaCrear();
                                break;
                        }
                    } 
                ?>
            </section>
<?php include "inc/piedepagina.php" ?>        