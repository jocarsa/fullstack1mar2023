<?php

function menuNavegacion(){
    // Me conecto a la base de datos
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");

    // Configuro la conexión en utf8
    mysqli_set_charset($conexion, "utf8mb4");

    // Preparo una petición a la base de datos
    $peticion = "
    SHOW TABLES
    ";

    // Guardo la petición en un array
    $resultado = mysqli_query($conexion, $peticion);
    // Repaso el array y lo devuelvo por pantalla
    while ($fila = mysqli_fetch_assoc($resultado)) {

            echo '
                <li>
                    <a href="?tabla='.$fila['Tables_in_aplicacionweb'].'">'.$fila['Tables_in_aplicacionweb'].'</a>
                </li>
            ';
    }
}

function eliminarRegistro(){
    echo "<h3>Eliminación de registros</h3>";
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
    $peticion = "
    DELETE FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."
    ";
    mysqli_query($conexion, $peticion);
    echo "<p>Registro borrado correctamente</p>";
    echo "<p>Redirigiendo en 5 segundos...</p>";
    echo '<meta http-equiv="Refresh" content="5; url=?tabla='.$_GET['tabla'].'" />';
}

function visualizarRegistro(){
    echo "<h3>Visualización de registros</h3>";
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
    mysqli_set_charset($conexion, "utf8mb4");
    $peticion = "
    SELECT * FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."
    ";
    $resultado = mysqli_query($conexion, $peticion);
    while ($fila = mysqli_fetch_assoc($resultado)) {

        foreach($fila as $clave=>$valor){
            echo "<h4>".$clave."</h4><p>".$valor."</p><br>";
        }
    }
}

function actualizaRegistro(){
    echo "<h3>Actualización de registros</h3>";
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
    mysqli_set_charset($conexion, "utf8mb4");
    $peticion = "
    SELECT * FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."
    ";
    $resultado = mysqli_query($conexion, $peticion);
    echo "<form action='?operacion=procesaactualizar&tabla=".$_GET['tabla']."' method='POST'>";
    while ($fila = mysqli_fetch_assoc($resultado)) {

        foreach($fila as $clave=>$valor){
            echo "<h5>".$clave."</h5>";
            if(strpos($clave,"FK") !== false){
                //echo "desplegable";
                echo "<select name='".$clave."'> ";
                $piezas = explode("_",$clave);
                $peticion2 = "
                    SELECT Identificador,".$piezas[2]." 
                    FROM ".$piezas[1]."
                   
                    ";
                $resultado2 = mysqli_query($conexion, $peticion2);
                while ($fila2 = mysqli_fetch_assoc($resultado2)) {
                    echo "<option value='".$fila2['Identificador']."'>".$fila2[$piezas[2]]."</option>";
                }
                echo "</select>";
            }else{
                
            
            echo "<input type='text' name='".$clave."' value='".$valor."'><br><br><br>";
                }
        }
    }
    echo "<input type='submit'>";
    echo "</form>";
}
function procesaActualizar(){
    echo "Vamos a ver qué viene por POST<br>";
    //var_dump($_POST);
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
    mysqli_set_charset($conexion, "utf8mb4");
    $peticion = "UPDATE ";
    $peticion .= $_GET['tabla'];
    $peticion .= " SET ";
    foreach($_POST as $clave=>$valor){
        $peticion .= $clave."='".$valor."',";
    }
    $peticion = substr_replace($peticion ,"", -1);
    $peticion .= " WHERE Identificador = ".$_POST['Identificador'].";";
    echo $peticion;
    mysqli_query($conexion, $peticion);
    echo "<p>Registro actualizado correctamente</p>";
    echo "<p>Redirigiendo en 5 segundos...</p>";
    echo '<meta http-equiv="Refresh" content="5; url=?tabla='.$_GET['tabla'].'" />';
}
function crear(){
    echo "<h3>Creación de registros</h3>";
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
    mysqli_set_charset($conexion, "utf8mb4");
    $peticion = "
    SHOW COLUMNS FROM ".$_GET['tabla']."
    ";
    $resultado = mysqli_query($conexion, $peticion);
    echo "<form action='?operacion=procesacrear&tabla=".$_GET['tabla']."' method='POST'>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<h5>".$fila['Field']."</h5>";
            if(strpos($fila['Field'],"FK") !== false){
                //echo "desplegable";
                echo "<select name='".$fila['Field']."'> ";
                $piezas = explode("_",$fila['Field']);
                $peticion2 = "
                    SELECT Identificador,".$piezas[2]." 
                    FROM ".$piezas[1]."
                   
                    ";
                $resultado2 = mysqli_query($conexion, $peticion2);
                while ($fila2 = mysqli_fetch_assoc($resultado2)) {
                    echo "<option value='".$fila2['Identificador']."'>".$fila2[$piezas[2]]."</option>";
                }
                echo "</select>";
            }else{
                
            
            echo "<input type='text' name='".$fila['Field']."' ><br><br><br>";
                }
            
    }
    echo "<input type='submit'>";
    echo "</form>";
}

function procesaCrear(){
    echo "Vamos a ver qué viene por POST<br>";
    //var_dump($_POST);
    $conexion = mysqli_connect("localhost", "usuariodb", "contrasenadb", "aplicacionweb");
    mysqli_set_charset($conexion, "utf8mb4");
    $peticion = "INSERT INTO ";
    $peticion .= $_GET['tabla'];
    $peticion .= " VALUES(NULL, ";
    $contador = 0;
    foreach($_POST as $clave=>$valor){
        if($contador != 0){
            $peticion .= "'".$valor."',";
        }
        $contador++;
    }
    $peticion = substr_replace($peticion ,"", -1);
    $peticion .= ")";
    echo $peticion;
    mysqli_query($conexion, $peticion);
    echo "<p>Registro creado correctamente</p>";
    echo "<p>Redirigiendo en 5 segundos...</p>";
    echo '<meta http-equiv="Refresh" content="5; url=?tabla='.$_GET['tabla'].'" />';
}
?>