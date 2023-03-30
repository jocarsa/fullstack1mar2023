<?php
    $imagen = imagecreatefromjpeg('josevicente.jpg');
    imagefilter($imagen, IMG_FILTER_GRAYSCALE);
    imagejpeg($imagen, 'guardado.jpg');
    imagedestroy($imagen);
?>