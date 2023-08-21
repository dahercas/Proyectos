<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Checkout example · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">

    

    

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      #formulario{
        width: 55%;
        margin: auto;
      }
        
        
    </style>

    
    <!-- Custom styles for this template -->
    <link href="checkout.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="./assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Nuevo registro</h2>
      <p class="lead">Aqui podrás crear un nuevo registro.</p>
    </div>

    
      <div class="col-md-7 col-lg-8" id="formulario">
        <h4 class="mb-3">Introduce los nuevos registros</h4>
        <form class="needs-validation" novalidate method="POST" action="procesainsertar.php">
          <div class="row g-3">
            
        <input type="hidden" class="form-control" id="addres2" name="tabla" value="<?php echo $_GET['tabla']?>">
        <input type="hidden" class="form-control" id="addres2" name="id" value="<?php echo $_GET['id']?>">

            <?php
                // Incluye la conexion a la base de datos
                include "conexiondb.php";
                // Con la peticion saca las columnas
                $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
                $resultado = mysqli_query($enlace,$peticion);
                while($fila = $resultado->fetch_assoc()){
                    // Si la fila no es Identificador
                    if($fila['Field'] != "Identificador"){
                        // Crea un label y le da el nombre de la columna
                        echo '<div class="col-12">
                            <label for="address2" class="form-label" style="text-transform:capitalize;">'.$fila['Field'].'</label>';
                    }else{
                    // Si la columnna es identificador no muestra nada
                    }
                    // Si la columnna es tipo
                    if($fila['Field'] == "tipo"){
                        // Crea un desplegable para elegir tres opciones
                        echo '
                        <select class="form-select" name="'.$fila['Field'].'" id="address2">';
                        $peticion2 = "SELECT ".$fila['Field']." AS columna FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'].";";
                        $resultado2 = mysqli_query($enlace,$peticion2);
                        while($fila2 = $resultado2->fetch_assoc()){
                            $selected_luces = '';
                            $selected_electrodomesticos = '';
                            $selected_dispositivos = '';
                            if ($fila2['columna'] == 'Luces') {
                                $selected_luces = 'selected';
                            } elseif ($fila2['columna'] == 'Electrodomesticos') {
                                $selected_electrodomesticos = 'selected';
                            } elseif ($fila2['columna'] == 'Dispositivos') {
                                $selected_dispositivos = 'selected';
                            }
                            echo '
                            <option value="Luces" '.$selected_luces.'>Luces</option>
                            <option value="Electrodomesticos" '.$selected_electrodomesticos.'>Electrodomesticos</option>
                            <option value="Dispositivos" '.$selected_dispositivos.'>Dispositivos</option>';
                        }
                        echo '
                        </select>';
                    }elseif($fila['Field'] == "Identificador"){
                    // Si la columnna es identificador no muestra nada
                    }else{
                        // Si no es ninguno de los casos anteriores crea un input normal y le da el valor de la columna
                        $peticion2 = "SELECT ".$fila['Field']." AS columna FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'].";";
                        $resultado2 = mysqli_query($enlace,$peticion2);
                        while($fila2 = $resultado2->fetch_assoc()){
                            echo'
                            <input type="text" name="'.$fila['Field'].'" class="form-control" id="address2" value="'.$fila['Field'].'" onclick="borrarTexto(this)">
                            ';
                        }
                    }
                    echo '
                    </div>';
                }
                ?>
            
            <script>
                // Esta funcion deja el campo de texto vacio
                function borrarTexto(campo) {
                  campo.value = '';
                }
            </script>
          </div>

          <hr class="my-4">
          <!--BOTON PARA INTRODUCIR LOS REGISTROS-->
          <button class="w-100 btn btn-primary btn-lg" type="submit">Introducir registro</button>
        </form>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2023 Proyecto Final Daniel Hernández</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacidad</a></li>
      <li class="list-inline-item"><a href="#">Terminos</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="checkout.js"></script>
  </body>
</html>
