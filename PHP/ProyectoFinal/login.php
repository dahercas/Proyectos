<?php
session_start();
//Abro la conexion con la base de datos
include "conexiondb.php";
// Mira si los datos introsucidos en el login coiciden con la base de datos
$peticion = "
SELECT * FROM usuarios
WHERE
usuario = '".$_POST['usuario']."'
AND
contrasena = '".$_POST['contrasena']."'
LIMIT 1
";
$resultado = mysqli_query($enlace,$peticion);
$pasas = false;
$_SESSION['pasas'] = false;
// Si coinciden
if($fila = $resultado->fetch_assoc()){
    // Cambia el estado de pasas
    $pasas = true;
    // Crea variables globales con el nombre apellidos e Identificador
    $_SESSION['Identificador'] = $fila['Identificador'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['apellidos'] = $fila['apellidos'];
}else{
    // Si no coinciden
    $pasas = false;
}
// Si pasas es true
if($pasas){
    // Lleva al usuario a la pagina escritorio.php
    $_SESSION['pasas'] = true;
    echo '<meta http-equiv="refresh" content="0.5; url=escritorio.php">';
}else{
    // Si pasas es false salta mensaje de que no da acceso y lleva al usuario al inicio de sesion
    $_SESSION['pasas'] = false;
    echo "Usuario incorrecto";
    echo '<meta http-equiv="refresh" content="2; url=index.html">';
}

// Cierro los recursos que haya abierto
mysqli_close($enlace);
?>