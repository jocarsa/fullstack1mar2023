<?php

    $archivo = fopen("log/registros.csv","a+");
    $post = "";
    foreach($_POST as $clave=>$valor){
        $post .= $clave.":".$valor."|";
    }
    $get = "";
    foreach($_GET as $clave=>$valor){
        $get .= $clave.":".$valor."|";
    }
    $sesion = "";
    foreach($_SESSION as $clave=>$valor){
        if(is_array($valor)){
            @$sesion .= $clave.":".json_encode($valor)."|";
        }else{
            @$sesion .= $clave.":".$valor."|";
        }
        
    }
    $pagina = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";   
    $cadena = date('U').",".
        date('Y').",".
        date('m').",".
        date('d').",".
        date('H').",".
        date('i').",".
        date('s').",".
        $_SERVER['REMOTE_ADDR'].",".
        $_SERVER['HTTP_USER_AGENT'].",".
        $pagina.",".
        $post.",".
        $get.",".
        $sesion."\n";
        
    fwrite($archivo, $cadena);

?>