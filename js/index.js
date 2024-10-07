// Make navigateToHome function globally available
window.navigateToHome = function () {
  if (localStorage.getItem("authToken")) {
    window.location.href = "./homepage.html";
  } else {
    window.location.href = "./index.html";
  }
};

// Make logout function globally available
window.logout = function () {
  //localStorage.removeItem("authToken");
  //window.location.href = "./index.php";
  window.location.href = 'cerrar_al.php';

};

document.addEventListener("DOMContentLoaded", function () {
  // View switching
  window.showView = function (viewId) {
    document.querySelectorAll(".view").forEach((view) => view.classList.remove("active"));
    document.getElementById(viewId + "View").classList.add("active");
  };

  // Registration form handling
  const registroForm = document.getElementById("registroForm");
  const page1 = document.getElementById("page1");
  const page2 = document.getElementById("page2");
  const nextBtn = document.getElementById("nextBtn");
  const prevBtn = document.getElementById("prevBtn");

  nextBtn.addEventListener("click", function () {
    if (validatePage1()) {
      page1.classList.remove("active");
      page2.classList.add("active");
    }
  });

  prevBtn.addEventListener("click", function () {
    page2.classList.remove("active");
    page1.classList.add("active");
  });

  function validatePage1() {
    const email = document.getElementById("email").value;
    const passwd = document.getElementById("passwd").value;
    const confirmPasswd = document.getElementById("confirmPasswd").value;

    if (!email || !passwd || !confirmPasswd) {
      alert("Por favor, completa todos los campos");
      return false;
    }

    if (passwd !== confirmPasswd) {
      alert("Las contraseñas no coinciden");
      return false;
    }

    return true;
  }

  document.getElementById("registroForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma tradicional

    const matricula = document.getElementById("matricula").value;
    const apellidoP = document.getElementById("apellidoP").value;
    const apellidoM = document.getElementById("apellidoM").value;
    const nombres = document.getElementById("nombres").value;
    const email = document.getElementById("email").value;
    const passwd = document.getElementById("passwd").value;

    fetch("registrarAl.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ matricula, apellidoP, apellidoM, nombres, email, passwd })
    })
    .then((response) => {
        // Verificar si la respuesta es correcta
        if (!response.ok) {
            throw new Error('Error en la red: ' + response.statusText);
        }
        return response.json();
    })
    .then((data) => {
        // Procesar la respuesta del servidor
        if (data.success) {
            alert('Registro exitoso! Ya puedes iniciar sesión');
            showView("login");
        } else {
            alert("Ya existe ese No. de Cuenta");
        }
    })
    .catch((error) => {
        // Manejar errores
        console.error("Error:", error);
        alert("Ocurrió un error. Por favor, intenta de nuevo: ");
        //alert("Ocurrió un error. Por favor, intenta de nuevo: " + error);
    });
  });

  // Login form handling
  const loginForm = document.getElementById("loginForm");

  loginForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const numCta = document.getElementById("loginNumCta").value;
    const passwd = document.getElementById("loginPasswd").value;

    fetch("verificar_al.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ numCta, passwd }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Store the token in localStorage
          //localStorage.setItem("authToken", data.token);
          //alert("Login exitoso!");
          // Redirect to user dashboard or homepage
          window.location.href = "./homepage.php";
        } else {
          alert(data.message);
          //alert("Error en el login: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Ocurrió un error. Por favor, intenta de nuevo.");
      });
  });

  // Function to check login state
  window.checkLoginState = function () {
    const token = localStorage.getItem("authToken");
    return token != null;
  };
});

document.addEventListener("DOMContentLoaded", function () {
  const darkModeToggle = document.getElementById("darkModeToggle");
  const body = document.body;

  // Check for saved dark mode preference
  if (localStorage.getItem("darkMode") === "enabled") {
    body.classList.add("dark-mode");
    darkModeToggle.checked = true;
  }

  // Toggle dark mode
  darkModeToggle.addEventListener("change", function () {
    if (this.checked) {
      body.classList.add("dark-mode");
      localStorage.setItem("darkMode", "enabled");
    } else {
      body.classList.remove("dark-mode");
      localStorage.setItem("darkMode", null);
    }
  });
});
