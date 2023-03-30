<?php
mkdir("fotos2");
$carpeta = "fotos/";
$archivos = scandir($carpeta);
$contador = 0;
foreach($archivos as $archivo){
    if($contador >= 2){
        echo "voy a trabajar con el archivo: ".$archivo."<br>";
        $cargaimagen = imagecreatefromjpeg("fotos/".$archivo);
        $imagen = getimagesize("fotos/".$archivo);
        $anchura = $imagen[0];
        $altura = $imagen[1];
        echo "La imagen es de ".$anchura." pixeles de ancho X ".$altura." pixeles de alto<br>";
        $rojominimo = 100000;$rojomaximo = 0;
        $verdeminimo = 100000;$verdemaximo = 0;
        $azulminimo = 100000;$azulmaximo = 0;
        for($x = 0;$x<$anchura;$x++){
            for($y = 0;$y<$anchura;$y++){
                $rgb = imagecolorat($cargaimagen, $x, $y);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;
                if($r < $rojominimo){$rojominimo = $r;}
                if($r > $rojomaximo){$rojomaximo = $r;}
                if($g < $verdeminimo){$verdeminimo = $g;}
                if($g > $verdemaximo){$verdemaximo = $g;}
                if($b < $azulminimo){$azulminimo = $b;}
                if($b > $azulmaximo){$azulmaximo = $b;}
                $gris = round(($r+$g+$b)/3);
                $color = imagecolorallocate($cargaimagen, $gris, $gris, $gris);
                imagesetpixel($cargaimagen,$x,$y,$gris);
            }
        }
        echo "Minimo: ".$rojominimo.",".$verdeminimo.",".$azulminimo."<br>";
        echo "Máximo: ".$rojomaximo.",".$verdemaximo.",".$azulmaximo."<br>";
        imagejpeg($cargaimagen, "fotos2/".$archivo);
        imagedestroy($cargaimagen);
    }
    
    $contador++;
}

?>