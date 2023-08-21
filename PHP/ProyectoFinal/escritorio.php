<?php 
    session_start();
    include "conexiondb.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Template · Bootstrap v5.3</title>
    <script src="https://kit.fontawesome.com/e077bc2bee.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <!-- EL NOMBRE DE LA EMPRESA/APLICACION -->
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Emoresa</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
        <!-- BOTON DE CERRAR SESION QUE TE LLEVA AL LOGIN -->
      <a class="nav-link px-3" href="index.html">Cerrar sesión</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column" style="text-transform:capitalize;">
            <?php
            // Le pide a la base de datos que le diga las tablas que hay
            $peticion = "SHOW TABLES";
            $resultado = mysqli_query($enlace,$peticion);
            while($fila = $resultado->fetch_assoc()){
                // La estructura if en este caso la uso para ponerle un simbolo diferente a cada tabla y dejar otro simbolo general por si se añaden mas tablas
                if($fila['Tables_in_proyectofinal'] == 'usuarios'){
                    // Crea un elemento de lista el cual recibe como texto el nombre de dicha tabla, pone la primera letra en mayusculas y le añade un simbolo
                    echo '<li class="nav-item">
                        <a class="nav-link" href="?tabla='.$fila['Tables_in_proyectofinal'].'">
                        <span data-feather="user" class="align-text-bottom"></span>
                        '.$fila['Tables_in_proyectofinal'].'
                        </a>
                    </li>';
                // Repite la operacion con las diferentes tablas
                }elseif($fila['Tables_in_proyectofinal'] == 'usos'){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="?tabla='.$fila['Tables_in_proyectofinal'].'">
                    <span data-feather="database" class="align-text-bottom"></span>
                    '.$fila['Tables_in_proyectofinal'].'
                    </a>
                    </li>';
                }elseif($fila['Tables_in_proyectofinal'] == 'usomensual'){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="?tabla='.$fila['Tables_in_proyectofinal'].'">
                    <span data-feather="calendar" class="align-text-bottom"></span>
                    '.$fila['Tables_in_proyectofinal'].'
                    </a>
                    </li>';
                }elseif($fila['Tables_in_proyectofinal'] == 'dispositivos'){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="?tabla='.$fila['Tables_in_proyectofinal'].'">
                    <span data-feather="monitor" class="align-text-bottom"></span>
                    '.$fila['Tables_in_proyectofinal'].'
                    </a>
                    </li>';
                // Aqui es lo mismo pero con un simbolo diferente a las demas, por si se añaden mas tablas, que pueda ser escalale y no desntone de la estetica general
                }else{
                    echo '<li class="nav-item">
                    <a class="nav-link" href="?tabla='.$fila['Tables_in_proyectofinal'].'">
                    <span data-feather="clipboard" class="align-text-bottom"></span>
                    '.$fila['Tables_in_proyectofinal'].'
                    </a>
                    </li>';
                }
                
            }
            ?>
          
          
        </ul>
          <!--ESTA ES UNA SECCION COMO LA LISTA ANTERIOR PERO EN ESTE CASO SOLO SE MUESTRAN LAS VISTAS DE LAS BASE DE DATOS-->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Informes guardados</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
          <!--INDICE PARA CAMBIAR ENTRE TABLAS-->
        <ul class="nav flex-column mb-2" style="text-transform:capitalize;">
            <?php
            // Hace una consulta a la base de datos para sacar las vistas
            $peticion = "SHOW FULL TABLES IN proyectofinal WHERE TABLE_TYPE LIKE 'VIEW'";
            $resultado = mysqli_query($enlace,$peticion);
            while($fila = $resultado->fetch_assoc()){
                // Muestra una lista de las vistas de la base de datos, pero en este caso no diferencio entre vistas
                echo '<li class="nav-item">
                <a class="nav-link" href="?tabla='.$fila['Tables_in_proyectofinal'].'">
                <span data-feather="bookmark" class="align-text-bottom"></span>
                '.$fila['Tables_in_proyectofinal'].'
                </a>
                </li>';
            }
            ?>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php
          // Muestra un mensaje de bienvenida al usuario recogiendo su nombre usando una variable global que he declarado en el login
            echo '<h1 class="h2">Bienvenido '.$_SESSION['nombre'].'</h1>';
        ?>
      </div>

        <?php
            // Recoge el nombre de la tabla para mostrar que tabla estamos visualizando
            echo '<h2>Sección '.$_GET['tabla'].'</h2>';
        ?>
      <div class="table-responsive">
          <style>.table-responsive{overflow-x: visible !important}</style>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <!--ENCABEZADO DE LA TABLA-->
                <?php
                // Aqui tengo un if con la misma funcion que el de la lista de tablas, ya que en la tabla de dispositivos añado una columna diferente a las demas tablas. Dicha columna es un boton de encendido/apagado ya que desde ahi encendemos o apagamos lo dispositivos
                if ($_GET['tabla'] == "dispositivos" ){
                    // En la peticion recoge las columnas de la tabla
                    $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
                    $resultado = mysqli_query($enlace,$peticion);
                        $contador = 0;
                        $cabeceras;
                    while($fila = $resultado->fetch_assoc()){
                        // Crea tantas cabeceras como columnas tenga la tabla de la base de datos y le añade el nombre de la fila
                        $cabeceras[$contador] = $fila['Field'];
                        echo '<th style="text-transform:capitalize; scope="col">'.$fila['Field'].'</th>';
                        $contador++;
                    }
                    // Añado un par de columnas
                    // El estado del dispositivo, aqui iran os botones de encendido/apagado
                    // Nuevo dispositivo te lleva a un formulario en el que puedes crear un nuevo registro en la tabla en la que te encuentres
                    // Las otras tres son operaciones CRUD
                    // La de actualizar te lleva a un formulario en el que puedes actualizar los registros(aunque haciendo doble click sobre el registro en concreto lo puedes actualizar sin ir al formulario)
                    // La de eliminar elimina el registro
                    echo '<th>Estado</th>
                        <th>Nuevo dispositivo</th>
                        <th>Ver</th>
                        <th>Actualizar</th>
                        <th>Eliminiar</th>';
                // Si no estoy en la de dispositivos, no muestra la opcion de encender
                }else{
                    $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
                    $resultado = mysqli_query($enlace,$peticion);
                        $contador = 0;
                        $cabeceras;
                    while($fila = $resultado->fetch_assoc()){
                        $cabeceras[$contador] = $fila['Field'];
                        echo '<th style="text-transform:capitalize; scope="col">'.$fila['Field'].'</th>';
                        $contador++;
                    }
                    echo '<th>Nuevo Registro</th>
                        <th>Ver</th>
                        <th>Actualizar</th>
                        <th>Eliminiar</th>';
                }
                ?>
            
            
                
            </tr>
          </thead>
          <tbody>
            <!--CONTENIDO DE LA TABLA-->
                <?php
              // Si estoy en la tabla de dispositivos, muestra una tabla con la opcion de encender
              if ($_GET['tabla'] == "dispositivos" ){
                // La peticion recoge todos los datos de la tabla en la que estemos
                $peticion = "SELECT * FROM ".$_GET['tabla'].";";
                $resultado = mysqli_query($enlace,$peticion);
                while($fila = $resultado->fetch_array()){
                    echo '<tr>'; // Arranca la fila
                    $contador = 0;
                    for($i = 0;$i<count($fila)/2;$i++){
                        // Muestra las columnas de la fila
                        echo '<td cabecera="'.$cabeceras[$contador].'" identificador='.$fila[0].'>'.$fila[$i].'</td>'; 
                        $contador++;
                    }
                    // Boton de encendido el cual adquiere el id de la fiña en la que este, y al hacer click ejecuta una funcion
                    // El boton de nuevo registro te lleva a un formulario para crear un nuevo registro en esta tabla
                    // El simbolo de ver te lleva a esta misma pagina
                    // El simbolo de actualizar te lleva a formulario para actualizar un registro de esta tabla
                    echo '<td><button class="timer-button" id="botononoff'.$fila[0].'"  onclick="onOff('.$fila[0].')">Apagado</button></td>
                        <td><a href="insertar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><button id="nuevo">Nuevo registro</button></a></td>
                        <td><a href="#"><i class="fas fa-eye"></i></a></td>
                        <td><a href="actualizar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fa fa-refresh" aria-hidden="true"></i></a></td>
                        <td><a href="eliminar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fas fa-trash-alt"></i></a></td>';
                    echo '</tr>'; // Cierra la fila
                    
                }
              // Si no estoy en la tabla de dispositivos, muestra otra tabla sin la opcion de encender
              }else{
                  $peticion = "SELECT * FROM ".$_GET['tabla'].";";
                $resultado = mysqli_query($enlace,$peticion);
                while($fila = $resultado->fetch_array()){
                    echo '<tr>'; // Arranca la fila
                    $contador = 0;
                    for($i = 0;$i<count($fila)/2;$i++){
                        // Muestra las columnas de la fila
                        echo '<td cabecera="'.$cabeceras[$contador].'" identificador='.$fila[0].'>'.$fila[$i].'</td>'; 
                        $contador++;
                    }
                    // El boton de nuevo registro te lleva a un formulario para crear un nuevo registro en esta tabla
                    // El simbolo de ver te lleva a esta misma pagina
                    // El simbolo de actualizar te lleva a formulario para actualizar un registro de esta tabla
                    echo '<td><a href="insertar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><button id="nuevo">Nuevo registro</button></a></td>
                        <td><a href="ver.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fas fa-eye"></i></a></td>
                        <td><a href="actualizar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fa fa-refresh" aria-hidden="true"></i></a></td>
                        <td><a href="eliminar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fas fa-trash-alt"></i></a></td>';
                    echo '</tr>'; // Cierra la fila
                }
              }
                ?>
          </tbody>
        </table>
          
      </div>
        <!--CODIGO/SCRIPT REFERENTE AL BOTON DE ENCENDIDO-->
            <script>
                // Aqui estan las funciones del boton de encendido
                // Declaro las variables que voy a necesitar
                var start = null
                var tiempo = 0;
                var mesactual = "";
                var iddisp = "";
                var tiempofinal = 0;
                var button = document.getElementById("botononoff" + id);
                // Esta funcion cuenta el tiempo que el boton esta encendido y lo guarda en la variable tiempo
                function updateTimer() {
                  if (start !== null) {
                    var now = new Date().getTime();
                    tiempo = Math.floor((now - start) / 1000); // calcula el tiempo transcurrido en segundos
                    // Si el boton esta encendido durante 1 hora salta una alerta, se apaga y ejecuta la funcion enviarDatos();
                    if(tiempo == 3600){
                        alert("El dispositivo lleva encendido una hora, si quiere continuar usandolo vuelva a encenderlo");
                        button.click();
                        tiempofinal = tiempo;
                        enviarDatos();
                    }
                    // Llama a la función updateTimer de nuevo después de 1 segundo
                    setTimeout(updateTimer, 1000);
                  }
                }
                // Esta funcion cambia el estado del boton de Apagado a Encendido
                function onOff(id) {
                  var button = document.getElementById("botononoff" + id);
                  if (button.innerHTML === "Apagado") {
                    iddisp = id;
                    button.innerHTML = "Encendido";
                    start = new Date().getTime(); // guarda el tiempo inicial
                    // Llama a la función updateTimer para actualizar el contador
                    updateTimer();
                    // Recoge el mes en el que estamos para introducirlo mas tarde en la base de datos
                    var fecha = new Date();
                    var mes = fecha.getMonth();
                    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                    mesactual = meses[mes];
                  } else {
                    // Cuando el estado sea apagado
                    // Recoge el tiempo final
                    tiempofinal = tiempo;
                    // Llama a la funcion enviarDatos
                    enviarDatos();
                    // Cambia el estado del boton a apagado y el estado de start a null
                    button.innerHTML = "Apagado";
                    start = null;
                  }
                }
                // Esta funcion recoge el id, el mes en el que estamos y el tiempo que ha estado el boton encendido
                function enviarDatos(id, mes, tiempo) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                      }
                    };
                    // Envia los datos al archivo guardasegundos.php
                    xhttp.open("POST", "guardarsegundos.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send("id=" + iddisp + "&mes=" + mesactual + "&tiempo=" + tiempofinal);
                }
            </script>
        <div id="ajax"></div>
    </main>
  </div>
</div>


    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="./lib/jquery-3.6.1.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      <script>
        // Este script hace que se puedan editar registros desde la tabla de la pagina principal, sin necesidad de ir al formulario de actualizar
        var tabla = '<?php echo $_GET['tabla']?>'
        // Al hacer doble click se ejecuta esta funcion que convierte el contenido editable
        $("td").dblclick(function(){
            $(this).attr("contenteditable","true");
        })
        // Cuando ya no estes entro del recuadro del registro se ejecuta esta funcion
        $("td").blur(function(){
            // El contenido deja de ser editable
            $(this).attr("contenteditable","false");
            // Recoge el valor
            var valor = $(this).text()
            // Recoge el identificador
            var identificador = $(this).attr("identificador")
            // Recoge la columna
            var columna = $(this).attr("cabecera")
            // Carga el valor, el identificador, la columna y la tabla
            $("#ajax").load("ajax.php?valor="+valor+"&identificador="+identificador+"&columna="+columna+"&tabla="+tabla)
            // Saca una alerta para que el usuario sepa que los datos se han actualizado
            alert("Tu registro se ha introducido en la base de datos")
        })
        
      </script>
  </body>
</html>