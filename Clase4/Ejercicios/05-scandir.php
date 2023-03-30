<?php
mkdir("fotos2");
$carpeta = "fotos/";
$archivos = scandir($carpeta);
$contador = 0;
foreach($archivos as $archivo){
    if($contador >= 2){
        echo "voy a trabajar con el archivo: ".$archivo."<br>";
        $imagen = getimagesize("fotos/".$archivo);
        $anchura = $imagen[0];
        $altura = $imagen[1];
        echo "La imagen es de ".$anchura." pixeles de ancho X ".$altura." pixeles de alto<br>";
    }
    $contador++;
}

?>