<?php

$lienzo = imagecreatetruecolor(512, 512);
$blanco = imagecolorallocate($lienzo, 255, 255, 255);
$negro = imagecolorallocate($lienzo, 0, 0, 0);
imagefilledrectangle($lienzo, 0, 0, 512, 512, $blanco);
header('Content-Type: image/jpeg');

imageline($lienzo,10,10,10,502,$negro);
imageline($lienzo,10,502,502,502,$negro);

imagejpeg($lienzo);
imagedestroy($lienzo);
?>