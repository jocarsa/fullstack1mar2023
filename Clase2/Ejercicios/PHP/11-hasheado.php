<?php

    $contrasena = "carratala";
    echo "La contraseña es: ".$contrasena."<br>";
    $hash1 = md5($contrasena);
    $hash2 = sha1($contrasena);
    echo "La contraseña codificada con md5 es: ".$hash1."<br>";
    echo "La contraseña codificada con sha1 es: ".$hash2."<br>";