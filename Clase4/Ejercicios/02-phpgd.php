<?php

$lienzo = imagecreatetruecolor(512, 512);
$rojo = imagecolorallocate($lienzo, 255, 0, 0);

imagefilledrectangle($lienzo, 50, 50, 150, 150, $rojo);
header('Content-Type: image/jpeg');

imagejpeg($lienzo);
imagedestroy($lienzo);
?>