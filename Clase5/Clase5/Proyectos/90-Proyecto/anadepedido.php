<?php
    session_start();
    array_push($_SESSION['carrito'],[$_POST['idproducto'],$_POST['unidades']]);
    header('Location: index.php');
?>