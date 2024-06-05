        </main>
        <footer>
            <h6>(c) 2023 Jose Vicente Carratalá Sanchis</h6>
            <?php
            if(count($_SESSION['carrito']) > 0){?>
            <section id="carrito">
                
            <?php
                carroDeLaCompra();
            ?>
                      
            <a href="vaciarcarrito.php"><button>Anular compra</button></a>   
            </section>
             <?php } ?> 
        </footer>
    </body>
</html>
<?php include "inc/registro.php";?>