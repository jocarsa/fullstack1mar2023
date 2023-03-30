<?php include "inc/cabecera.php";?>
<section id="producto">
<h3>Página de producto</h3>
<?php              
    productoSeleccionado();
?>
    </section>
<div class="clearfix"></div>
    <aside>
        <h4>Otros productos que te pueden interesar:</h4>
        <?php
              otrosProductos();
        ?>
    </aside>
<?php include "inc/piedepagina.php";?>