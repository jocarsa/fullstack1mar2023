<?php
   $edad = 55;
    if($edad < 30){
        if($edad < 10){
            echo "Eres un niño";
        }else{
            echo "Eres un joven";
        }

    }else{
        if($edad < 50){
           echo "Ya no eres tan joven";
        }else{
            echo "Definitivamente ya no eres joven";
        }

    }
?>