<?php
mkdir("fotos2");
$carpeta = "fotos/";
$archivos = scandir($carpeta);
$contador = 0;
foreach($archivos as $archivo){
    if($contador >= 2){
        echo "voy a trabajar con el archivo: ".$archivo."<br>";
    }
    $contador++;
}

?>