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

$anchura = 512-10-10;
$numeroelementos = count($partido);
$anchurabarra = $anchura/$numeroelementos;
$maximo = 0;
for($i = 0; $i<count($partido);$i++){
    if($partido[$i] > $maximo){$maximo = $partido[$i];}
}
$altura = 512 - 10 - 10;
$factor = $altura/$maximo;
for($i = 0; $i<count($partido);$i++){
    imagefilledrectangle($lienzo, $i*$anchurabarra+10, 502-$partido[$i]*$factor, $i*$anchurabarra+$anchurabarra-2, 502, $rojo);
}

imagejpeg($lienzo);
imagedestroy($lienzo);
?>