<?php

function productosPaginaPrincipal(){
    // Me conecto a la base de datos
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

    // Configuro la conexión en utf8
    mysqli_set_charset($conexion, "utf8mb4");

    // Preparo una petición a la base de datos
    $peticion = "
    SELECT * 
    FROM productos
    LIMIT 4
    ";

    // Guardo la petición en un array
    $resultado = mysqli_query($conexion, $peticion);
    // Repaso el array y lo devuelvo por pantalla
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '
            <article>
                <img src="photo/'.$fila['imagen'].'" alt="Producto">
                <h3>'.$fila['nombre'].'</h3>
                <p>'.$fila['descripcion'].'</p>
                <a href="producto.php?idproducto='.base64_encode($fila['Identificador']).'">
                <button>Comprar</button>
                </a>
            </article>
        ';
    }
}

function productoSeleccionado(){
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
     // Preparo una petición a la base de datos
    $peticion = "
    SELECT * 
    FROM productos
    WHERE Identificador = ".base64_decode($_GET['idproducto'])."
    ";

    // Guardo la petición en un array
    $resultado = mysqli_query($conexion, $peticion);
    // Repaso el array y lo devuelvo por pantalla
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '
            <article>
                <img src="photo/'.$fila['imagen'].'" alt="Producto">
                <h3>'.$fila['nombre'].'</h3>
                <h5>Descripción</h5>
                <p>'.$fila['descripcion'].'</p>
                <h5>Precio</h5>
                <p>'.$fila['precio'].'€</p>
                <h5>Existencias</h5>
                <p>'.$fila['existencias'].'u.</p>
                <h4>Compra</h4>
                <h5>Unidades</h5>
                <form action="anadepedido.php" method="POST">
                <input type="hidden" name="idproducto" value="'.base64_decode($_GET['idproducto']).'">
                <input type="number" name="unidades">
                <input type="submit">
                </form>
            </article>
        ';
    }

}

function otrosProductos(){
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
    // Preparo una petición a la base de datos
    $peticion = "
    SELECT * 
    FROM productos

    ";

    // Guardo la petición en un array
    $resultado = mysqli_query($conexion, $peticion);
    // Repaso el array y lo devuelvo por pantalla
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '
            <article>
                <img src="photo/'.$fila['imagen'].'" alt="Producto">
                <h3>'.$fila['nombre'].'</h3>
                <p>'.$fila['descripcion'].'</p>

                <a href="producto.php?idproducto='.$fila['Identificador'].'">
                <button>Comprar</button>
                </a>
            </article>
        ';
    }
}
?>