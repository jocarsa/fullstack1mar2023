<?php

    include "cabeceras.php";
    // Me conecto a la base de datos
    $basededatos = new SQLite3('whatchat.sqlite3');        
    // Le pido algo a la base de datos 
    $resultado = $basededatos->query("
    INSERT INTO mensajes 
    VALUES (
        NULL,
        '".$_GET['usuario']."',
        '',
        '".$_GET['mensaje']."',
        '".date('U')."'
    )");
?>