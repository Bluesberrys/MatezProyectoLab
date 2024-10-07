<?php
    session_name("sesion_alumno");
    session_start();
    if(isset($_SESSION["alumno"]) and $_SESSION["alumno"]==1)
    {
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mathez - Home</title>
    <link rel="icon" type="image/png" href="./img/M-titanone.png" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Titan+One&display=swap" />
    <link rel="stylesheet" href="./css/fonts.css" />
    <link rel="stylesheet" href="./css/styles-home.css" />
    <link rel="stylesheet" href="./css/styles-dark.css" />
  </head>

  <body>
    <!-- Header -->
    <header>
      <div class="navbar">
        <div class="title">
          <a href="#" onclick="navigateToHome(); return false;" class="alt-font">Mathez</a>
          <?php 
            //Agregué esto para mostrar el nombre completo del alumno 
            $nombre = $_SESSION["nombre"];
            $apellidoP = $_SESSION["apellidoP"];
            $apellidoM = $_SESSION["apellidoM"];
            $matricula = $_SESSION["matricula"];
            echo "<h3>Hola: " . $nombre . " "  . $apellidoP . " " . $apellidoM . "</h3>";
          ?>
        </div>
        <div class="navbar-menu">
          <div class="user-dropdown-container">
            <button id="userDropdownToggle" class="user-icon">
              <!-- <img src="./img/test_pfp.png" alt="" /> -->
              <i class="bi bi-person-circle"></i>
            </button>
            <div class="user-dropdown" id="userDropdown">
              <button onclick="" class="btn alt-font dropdown-item">Configuracion</button>
              <button onclick="logout()" class="btn alt-font dropdown-item">Cerrar sesion</button>
              <div class="darkmode-container dropdown-item">
                <h4>Modo oscuro</h4>
                <label class="switch">
                  <input type="checkbox" id="darkModeToggle" />
                  <span class="slider"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- body -->
    <?php

    //Consultar si el alumno esta inscrito en algun curso, si esta inscrito, que muestre la tabla de contenidos

    include_once "conexion.php";

    //Consulta para obtener la carrera del alumno
    $consultaInscripcion = mysqli_query($conexion, "SELECT * FROM inscripciones WHERE numCta = '$matricula'");
    
    $contarInscripcion = mysqli_num_rows($consultaInscripcion);

    if($contarInscripcion > 0)
    {
      ?>
      <main>
        <div class="container">
          <div class="container-title">
            <h1 class="alt-font">Tabla de contenidos</h1>
          </div>

          <div class="row">
            <div class="col">
              <a href="#" class="card">
                <h2>1</h2>
                <h3 class="card-title">Conjuntos</h3>
              </a>
              <a href="#" class="card">
                <h2>2</h2>
                <h3 class="card-title">Tipos de funciones</h3>
              </a>
              <a href="#" class="card">
                <h2>3</h2>
                <h3 class="card-title">Regla de correspondencia</h3>
              </a>
              <a href="#" class="card">
                <h2>4</h2>
                <h3 class="card-title">Características de la gráfica</h3>
              </a>
              <a href="#" class="card">
                <h2>5</h2>
                <h3 class="card-title">Variación a partir de un comportamiento de casos</h3>
              </a>
            </div>

            <div class="col">
              <a href="#" class="card">
                <h2>6</h2>
                <h3 class="card-title">Polinomios</h3>
              </a>
              <a href="#" class="card">
                <h2>7</h2>
                <h3 class="card-title">Racionalización</h3>
              </a>
              <a href="#" class="card">
                <h2>8</h2>
                <h3 class="card-title">Razones trigonométricas</h3>
              </a>
              <a href="#" class="card">
                <h2>9</h2>
                <h3 class="card-title">Variabilidad</h3>
              </a>
              <a href="#" class="card">
                <h2>10</h2>
                <h3 class="card-title">Sucesiones</h3>
              </a>
            </div>
          </div>
        </div>
      </main>
      <?php
    }else{
      ?>
      <h1><b>No estás inscrito en algún curso.</b></h1>
      <?php
    }

    mysqli_close($conexion);

    ?>

    <!-- Footer -->
    <footer>
      <div class="footer">
        <div class="">
          <p>©</p>
        </div>
        <a href="./sobreNos.html" class="btn">Sobre nosotros</a>
      </div>
    </footer>

    <script src="./js/index.js"></script>
    <script src="./js/nav.js"></script>
  </body>
</html>
<?php
    }
    else
    {
        header("Location:index.php"); 
    }
?>