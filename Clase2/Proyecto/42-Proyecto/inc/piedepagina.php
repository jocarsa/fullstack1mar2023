        </main>
        <footer>
            <h6>(c) 2023 Jose Vicente Carratalá Sanchis</h6>
            <section id="carrito">
                <h3>Carrito</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Unidades</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>Balon</td>
                            <td>10</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Balon</td>
                            <td>10</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Balon</td>
                            <td>10</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td colspan="3">Total</td>
                            <td >50</td>
                        </tr>
                    </tbody>
                    
                </table>
                <button>Pagar</button>
                <?php
                    var_dump($_SESSION['carrito']);
                ?>
            </section>
        </footer>
    </body>
</html>