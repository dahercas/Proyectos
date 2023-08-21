<?php
  session_start();
  include "conexiondb.php";
  // Si la conexion a la base de datos fracasa saca el error
  if ($enlace->connect_error) {
    die("Conexión fallida: " . $enlace->connect_error);
  }

  // Obtiene los valores de id, mes y tiempo desde la solicitud HTTP
  $id = $_POST["id"];
  $mes = $_POST["mes"];
  $tiempo = $_POST["tiempo"];

  // Inserta los valores en la tabla usos
  $peticion = "INSERT INTO usos VALUES (NULL,'".$_SESSION['Identificador']."','$id', '$tiempo', '$mes')";
  // Da feedback para que el usuario sepa si ha salido bien o si da error
  if ($enlace->query($peticion) === TRUE) {
    echo "Datos insertados correctamente";
  } else {
    echo "Error al insertar datos: " . $enlace->error;
  }
  // Cierra la conexion
  $enlace->close();
?>