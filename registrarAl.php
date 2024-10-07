<?php

    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);

    include_once "conexion.php";

    if (empty($data)) {
        echo json_encode(['success' => false, 'message' => 'No se recibieron datos.']);
        exit();
    }

    $numCta = $data['matricula'];
    $apellidoP =  mysqli_real_escape_string($conexion, $data['apellidoP']);
    $apellidoM = mysqli_real_escape_string($conexion, $data['apellidoM']);
    $nombres =  mysqli_real_escape_string($conexion, $data['nombres']);
    $email =  mysqli_real_escape_string($conexion, $data['email']);
    $passwd =  mysqli_real_escape_string($conexion, $data['passwd']);

    $verificarAl = mysqli_query($conexion, "SELECT * FROM alumnos WHERE numCta = '$numCta'");

    $contarAl = mysqli_num_rows($verificarAl);

    if($contarAl){
        echo json_encode(['success' => false, 'message' => 'Ya existe ese No. de Cuenta']);
    }
    else{
        $insertar = mysqli_query($conexion, "INSERT INTO alumnos (numCta, apellidoP, apellidoM, nombres, email, passwd) 
        VALUES ('$numCta', '$apellidoP', '$apellidoM', '$nombres', '$email', '$passwd')");

        if ($insertar) {
            echo json_encode(['success' => true, 'numCta' => $numCta]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar: ' . $conexion->error]);
        }
    }

    mysqli_close($conexion);

?>