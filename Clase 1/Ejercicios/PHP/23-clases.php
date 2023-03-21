<?php
   class Persona{
        function __construct(){
            $this->edad = 0;
        }
       function saluda(){
           return("Yo te saludo");
       }
    }

    $Juan = new Persona();
    echo $Juan->edad; 
    $Juan->edad = 1;
    echo "<br>";
    echo $Juan->edad;
    echo "<br>";
    echo $Juan->saluda();
    
?>