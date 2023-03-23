<?php
    
    $contrasena = "carratala";
    echo "La contraseña es: ".$contrasena."<br>";
    $codificado = base64_encode($contrasena);
    echo "La contraseña codificada es: ".$codificado."<br>";
    $descodificado = base64_decode($codificado);
    echo "La contraseña descodificada es: ".$descodificado."<br>";

?>