<?php

include "conexiondb.php";
// Recoge los registros introducidos en el fomulario de registrar un nuevo usuario y los inserta en la base de datos
$peticion = "
INSERT INTO 
usuarios
VALUES
(NULL,
'".$_POST['usuario']."',
'".$_POST['contrasena']."',
'".$_POST['nombre']."',
'".$_POST['apellidos']."',
'".$_POST['email']."',
'".$_POST['telefono']."')
";
$resultado = mysqli_query($enlace,$peticion);
// Da feedback para que el usuario sepa que ha salido bien
echo '<p>Creando el nuevo usuario</p>';
// Te devuelve al login
echo '<meta http-equiv="refresh" content="3; url=index.html">';
?>