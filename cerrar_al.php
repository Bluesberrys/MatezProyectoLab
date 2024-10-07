<?php
    session_name("sesion_alumno");
    session_start();
    session_unset();
    session_destroy();

    header("Location:index.php");
    
    exit();
?>