<?php
$valores = $_GET['valores'];
$partido = explode(",",$valores);
$lienzo = imagecreatetruecolor(512, 512);
$blanco = imagecolorallocate($lienzo, 255, 255, 255);
$negro = imagecolorallocate($lienzo, 0, 0, 0);
$rojo = imagecolorallocate($lienzo, 255, 0, 0);
imagefilledrectangle($lienzo, 0, 0, 512, 512, $blanco);
header('Content-Type: image/jpeg');

imageline($lienzo,10,10,10,502,$negro);
imageline($lienzo,10,502,502,502,$negro);

for($i = 0; $i<count($partido);$i++){
    $altura = rand(10,502);
    imagefilledrectangle($lienzo, $i*12+10, 502-$partido[$i], $i*12+10+10, 502, $rojo);
}

imagejpeg($lienzo);
imagedestroy($lienzo);
?>