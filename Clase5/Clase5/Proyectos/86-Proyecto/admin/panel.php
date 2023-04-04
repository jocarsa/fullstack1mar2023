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
                            
                            echo '
                            <img src="inc/grafica.php?valores=a:100|b:200|c:400|d:30" class="grafica">
                            <img src="inc/grafica.php?valores=a:200|b:200|c:200|d:20" class="grafica">
                            <img src="inc/grafica.php?valores=a:300|b:200|c:300|d:320" class="grafica">
                            <img src="inc/grafica.php?valores=a:400|b:200|c:400|d:10" class="grafica">
                            <img src="inc/grafica.php?valores=a:100|b:200|c:400|d:30" class="grafica">
                            <img src="inc/grafica.php?valores=a:200|b:200|c:200|d:20" class="grafica">
                            <img src="inc/grafica.php?valores=a:300|b:200|c:300|d:320" class="grafica">
                            <img src="inc/grafica.php?valores=a:400|b:200|c:400|d:10" class="grafica">
                            ';
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