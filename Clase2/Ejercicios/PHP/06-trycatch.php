<?php
    
    try{
        include "incluidomal.php";
        echo "Hola";
        echo $edad;
    }catch(Exception $e){
        echo "Ha ocurrido algun error";
    }

?>