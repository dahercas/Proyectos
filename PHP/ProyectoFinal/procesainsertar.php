<?php
    // Incluye la conexion a la base de datos
    include "conexiondb.php";
    // Defino las variables que necesito
    $contador = 0;
    $campos = array();
    $valores = array();
    foreach($_POST as $clave => $valor){
        if($contador >= 2){
            echo "Voy a introducir los registros<br>";
            $campos[] = $clave;
            $valores[] = $valor;
        }
        $contador++;
    }
    // Recoge los campos de la tabla
    $campos_str = implode(",", $campos);
    // Recoge los valores que va a introducir en la base de datos
    $valores_str = "'" . implode("','", $valores) . "'";
    // Introduce los valores en los campos de la tabla
    $peticion = "
        INSERT INTO ".$_POST['tabla']." ($campos_str)
        VALUES ($valores_str)";
    mysqli_query($enlace,$peticion );
    // Devuelve al usuario a la tabla que estaba visualizando
    echo '<meta http-equiv="refresh" content="2; url=escritorio.php?tabla='.$_POST['tabla'].'">';
?>