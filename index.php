<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mathez</title>
    <link rel="icon" type="image/png" href="./img/M-titanone.png" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Titan+One&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="./css/fonts.css" />
    <link rel="stylesheet" href="./css/styles-base.css" />
    <link rel="stylesheet" href="./css/styles-dark.css" />
  </head>

  <body>
    <main>
      <!-- body -->
      <div class="title">
        <a href="#" onclick="navigateToHome(); return false;" class="alt-font">
          <h1>Mathez</h1>
        </a>
      </div>

      <div class="card-menu">
        <div class="card">
          <!-- Home View -->
          <div id="homeView" class="view active">
            <p class="card-text">
              "Los problemas matemáticos no son más que ejercicios para entrenar a nuestros cerebros."
              <br />- Albert Einstein
            </p>
            <div class="form">
              <button onclick="showView('login')" class="btn alt-font">Iniciar Sesión</button>
              <button onclick="showView('register')" class="btn alt-font">Registro</button>
            </div>
          </div>

          <!-- Login View -->
          <div id="loginView" class="view">
            <div class="card-title">
              <h2 id="iniciar-sesion" class="alt-font">Iniciar sesión</h2>
            </div>
            <!-- Form -->
            <form id="loginForm" class="form">
              <div class="form-input">
                <label for="loginNumCta">Número de Cuenta</label>
                <input
                  type="text"
                  id="loginNumCta"
                  name="loginNumCta"
                  placeholder="Numero"
                  autofocus
                  required />
              </div>
              <div class="form-input">
                <label for="loginPasswd">Contraseña</label>
                <input
                  type="password"
                  id="loginPasswd"
                  name="loginPasswd"
                  placeholder="Contraseña"
                  required />
              </div>
              <a href="#" onclick="showView('passwordRecovery'); return false;" class="rec-link"
                >Olvide mi contraseña</a
              >
              <button type="submit" class="btn alt-font">Iniciar Sesión</button>
            </form>
          </div>

          <!-- Register View -->
          <div id="registerView" class="view">
            <div class="card-title">
              <h2 id="registro" class="alt-font">Registro</h2>
            </div>
            <form class="form" id="registroForm">
              <div id="page1" class="form-page active">
                <div class="form-input">
                  <label for="email">Correo electrónico</label>
                  <input type="email" id="email" name="email" placeholder="Email" required />
                </div>
                <div class="form-input">
                  <label for="passwd">Contraseña</label>
                  <input type="password" id="passwd" name="passwd" placeholder="Contraseña" required />
                </div>
                <div class="form-input">
                  <label for="confirmPasswd">Confirmar Contraseña</label>
                  <input
                    type="password"
                    id="confirmPasswd"
                    name="confirmPasswd"
                    placeholder="Contraseña"
                    required />
                </div>
                <button type="button" id="nextBtn" class="btn alt-font">Siguiente</button>
              </div>
              <div id="page2" class="form-page">
                <div class="form-input">
                  <label for="matricula">No. de Cuenta</label>
                  <input
                    type="text"
                    inputmode="numeric"
                    id="matricula"
                    name="matricula"
                    placeholder="No. de Cuenta"
                    required />
                </div>
                <div class="form-input">
                  <label for="apellidoP">Apellido Paterno</label>
                  <input
                    type="text"
                    id="apellidoP"
                    name="apellidoP"
                    placeholder="Apellido paterno"
                    required />
                </div>
                <div class="form-input">
                  <label for="apellidoM">Apellido Materno</label>
                  <input
                    type="text"
                    id="apellidoM"
                    name="apellidoM"
                    placeholder="Apellido materno"
                    required />
                </div>
                <div class="form-input">
                  <label for="nombres">Nombres</label>
                  <input type="text" id="nombres" name="nombres" placeholder="Nombres" required />
                </div>
                <button type="button" id="prevBtn" class="btn-alt alt-font">Anterior</button>
                <button type="submit" class="btn alt-font">Registrar</button>
              </div>
            </form>
          </div>

          <!-- Password Recovery View (placeholder) -->
          <div id="passwordRecoveryView" class="view">
            <div class="card-title">
              <h2 class="alt-font">Recuperar Contraseña</h2>
            </div>
            <p>Funcionalidad de recuperación de contraseña pendiente.</p>
            <button onclick="showView('login')" class="btn">Volver a Iniciar Sesión</button>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer>
      <div class="footer">
        <div class="">
          <p>©</p>
        </div>
        <a href="./sobreNos.html" class="btn">Sobre nosotros</a>
        <div>
          <div class="darkmode-container">
            <h4>Modo oscuro</h4>
            <label class="switch">
              <input type="checkbox" id="darkModeToggle" />
              <span class="slider"></span>
            </label>
          </div>
        </div>
      </div>
    </footer>

    <script src="./js/index.js"></script>
  </body>
</html>
