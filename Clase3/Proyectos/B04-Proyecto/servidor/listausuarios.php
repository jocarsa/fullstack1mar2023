<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

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