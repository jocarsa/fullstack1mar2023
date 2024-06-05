<?php include "inc/cabecera.php";?>
<section id="producto">
<h3>Página de entrada del blog</h3>
<?php              
    entradaSeleccionada();
?>
    </section>
<div class="clearfix"></div>
    <aside>
        <h4>Otros productos que te pueden interesar:</h4>
        <?php
              otrosArticulos();
        ?>
    </aside>
<?php include "inc/piedepagina.php";?>