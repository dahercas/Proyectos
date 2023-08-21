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
            width: 60%;
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
      <h2>Nuevo usuario</h2>
      <p class="lead">Aqui podrás crear un nuevo usuario.</p>
    </div>
      <div class="col-md-7 col-lg-8" id="formulario">
        <h4 class="mb-3">Introduce tus datos</h4>
        <form class="needs-validation" novalidate method="POST" action="procesaregistro.php">
          <div class="row g-3">
        <!--UN INPUT ESCONDIDO PARA RECOGER LA TABLA-->
        <input type="hidden" class="form-control" id="addres2" name="tabla" value="usuarios">
            <?php
                // Incluye la conexion a la base de datos
                include "conexiondb.php";
                // Con la peticion saca las columnas
                $peticion = "SHOW COLUMNS FROM usuarios;";
                $resultado = mysqli_query($enlace,$peticion);
                while($fila = $resultado->fetch_assoc()){
                    // Si la fila no es Identificador
                    if($fila['Field'] != "Identificador"){
                        // Crea un label y le da el nombre de la fila
                        echo '<div class="col-12">
                            <label for="address2" class="form-label" style="text-transform:capitalize;">'.$fila['Field'].'</label>';
                    }else{
                    // Si la fila es identificador no muestra nada
                    }
                    // Si la fila no es identificador
                    if($fila['Field'] != "Identificador"){
                        $peticion2 = "SELECT ".$fila['Field']." AS columna FROM usuarios ;";
                        $resultado2 = mysqli_query($enlace,$peticion2);
                        // Crea un input, le da de valor el nombre de la fila y al hacer click se borra el contenido
                        echo'
                        <input type="text" name="'.$fila['Field'].'" class="form-control" id="address2" value="'.$fila['Field'].'" onclick="borrarTexto(this)">
                        ';
                    }else{
                    // Si la fila es Identificador no muestra nada
                    }
                    echo '
                    </div>';
                }
                ?>
            <script>
                // Esta funcion se ejecuta al hacer click en los inputs y hace que el texto que hay dentro se quede vacio
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
