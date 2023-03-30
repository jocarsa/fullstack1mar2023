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
                                actualizaRegistro();
                                break;
                            case "eliminar":
                                eliminarRegistro();
                                break;
                            case "procesaactualizar":
                                procesaActualizar();
                                break;
                        }
                    } 
                ?>
            </section>
<?php include "inc/piedepagina.php" ?>        