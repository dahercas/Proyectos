<?php
    include "conexiondb.php";
            // Esta peticion actualiza los campos de la tabla de la base de datos
            $peticion = "
            UPDATE ".$_GET['tabla']." 
            SET ".$_GET['columna']." = '".$_GET['valor']."'
            WHERE 
            Identificador = ".$_GET['identificador']."
            ";
            mysqli_query($enlace,$peticion );

?>