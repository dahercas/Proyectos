<?php
    include "conexiondb.php";
    // Elimina los registos de la base de datos que le hemos dicho cuando hemos pulado el simbolo de la basura en la tabla
    $peticion = "DELETE FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."";
    mysqli_query($enlace,$peticion );
    // Te devuelve a la pagina de la tabla que estabas visualizando
    echo '<meta http-equiv="refresh" content="2; url=escritorio.php?tabla='.$_GET['tabla'].'">';
?>