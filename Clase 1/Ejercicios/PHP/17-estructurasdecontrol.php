<?php
   $diadelasemana = "lunes";
            switch($diadelasemana){
                case "lunes":
                    echo "Hoy es el peor día de la semana";
                    break;
                case "martes":
                    echo "Hoy es el segundo peor día de la semana";
                    break;
                case "miercoles":
                    echo "Ya estamos a mitad de semana";
                    break;
                case "jueves":
                    echo "Ya es casi viernes";
                    break;
                case "viernes":
                    echo "Por fin es viernes";
                    break;
                case "sabado":
                    echo "El mejor dia de la semana";
                    break;
                case "domingo":
                    echo "Parece mentira que mañana sea lunes";
                    break;
                default:
                    echo "Lo que has escrito no es un día";
                    
            }
?>