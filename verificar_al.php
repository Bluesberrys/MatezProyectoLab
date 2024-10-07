<?php

    header('Content-Type: application/json');

    // Obtener datos de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    include_once "conexion.php";

    if (empty($data) || empty($data['numCta']) || empty($data['passwd'])) {
        echo json_encode(['success' => false, 'message' => 'No se recibieron datos válidos.']);
        exit();
    }

    $numCta = $data['numCta'];
    $passwd = $data['passwd'];

    $verificarAl = $conexion->prepare("SELECT * FROM alumnos WHERE numCta = ?");
    $verificarAl->bind_param('s', $numCta);
    $verificarAl->execute();

    $resultado = $verificarAl->get_result();

    if ($resultado->num_rows === 1) {

        $row = $resultado->fetch_assoc();
        
        // Verificar la contraseña
        if ($passwd === $row['passwd']) {

            $nombre = $row['nombres'];
            $apellidoP = $row['apellidoP'];
            $apellidoM = $row['apellidoM'];

            //Almacenar el nombre, apellidos en sesiones

            session_name("sesion_alumno");
            session_start();

            $_SESSION["alumno"] = 1;
            $_SESSION["matricula"] = $numCta;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["apellidoP"] = $apellidoP;
            $_SESSION["apellidoM"] = $apellidoM;

            echo json_encode(['success' => true, 'numCta' => $numCta]);

        } else {
            echo json_encode(['success' => false, 'message' => 'Contraseña incorrecta']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No existe ese usuario']);
    }

    $conexion->close();

?>