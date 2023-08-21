<?php
    // Incluye la conexion a la base de datos
    include "conexiondb.php";
    foreach($_POST as $clave => $valor){
        if($contador >= 2){
            // Aqui le muestra al usuario lo que se va a actualizar
            echo "Voy a actualizar el valor del campo ".$clave." con el valor ".$valor."<br>";
            // En la peticion actualiza los campos de la tabla
            $peticion = "
            UPDATE ".$_POST['tabla']." 
            SET 
            ".$clave." = '".$valor."'
            WHERE 
            Identificador = ".$_POST['id']."
            ";
            mysqli_query($enlace,$peticion );
        }
        $contador++;
    }
    // Devuelve al usuario a la tabla de que estabas visualizando
    echo '<meta http-equiv="refresh" content="2; url=escritorio.php?tabla='.$_POST['tabla'].'">';
?>