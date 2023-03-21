<?php
   class Persona{
        function __construct(){
            $this->edad = 0;
        }
    }

    $Juan = new Persona();
    echo $Juan->edad; 
    $Juan->edad = 1;
    echo "<br>";
    echo $Juan->edad;
    
?>