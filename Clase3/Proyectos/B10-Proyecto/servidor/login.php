<?php

    include "cabeceras.php";
    // Me conecto a la base de datos
    $basededatos = new SQLite3('whatchat.sqlite3');        
    // Le pido algo a la base de datos 
    $resultado = $basededatos->query('
    SELECT * 
    FROM usuarios
    WHERE
    (
    usuario = "'.$_GET['usuario'].'"
    AND
    contrasena = "'.$_GET['contrasena'].'"
    )
    ');
    // Para cada uno de los resultados
    if ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
        $coleccionJSON[] = $fila;
    }else{
        $coleccionJSON[] = "";
    }
    // Sacame por pantalla el JSON
    echo json_encode($coleccionJSON);
?>