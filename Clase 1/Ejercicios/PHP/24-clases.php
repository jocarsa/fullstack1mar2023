<?php
   class Persona{
        function __construct(){
            $this->edad = 0;
            $this->nombre = "";
        }
       function saluda(){
           return("Hola, ".$this->nombre.", yo te saludo");
       }
    }

    $Juan = new Persona();
    echo $Juan->edad; 
    $Juan->edad = 1;
    $Juan->nombre = "Juan";
    echo "<br>";
    echo $Juan->edad;
    echo "<br>";
    echo $Juan->saluda();
    
?>