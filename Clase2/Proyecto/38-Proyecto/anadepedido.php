<?php
    session_start();
    $_SESSION['productos'] = [$_POST['idproducto'],$_POST['unidades']];
    header('Location: index.php');
?>