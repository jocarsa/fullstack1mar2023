<?php
    // Me conecto a la base de datos
    $basededatos = new SQLite3('whatchat.sqlite3');        
    // Le pido algo a la base de datos 
    $resultado = $basededatos->query('SELECT * FROM usuarios');
    // Para cada uno de los resultados
    while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
        $coleccionJSON[] = $fila;
    }
    // Sacame por pantalla el JSON
    echo json_encode($coleccionJSON);
?>