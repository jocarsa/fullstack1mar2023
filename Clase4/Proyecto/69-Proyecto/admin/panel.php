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