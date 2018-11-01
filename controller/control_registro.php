<?php

//include '../models/User.php';
include "../config/database.php";

if (isset($_POST["btn-registro"])) {
    $nombre = $_POST["form-nombre"];
    $email = $_POST["form-email"];
    $tipo_usuario_get = $_POST["tipo-user"];
    $tipo_usuario = 0;
//    $correo_db = "";

    $usuario = explode('@', $email);
//echo 'usuario: ' . $usuario[0] . '<br>';

    if ($tipo_usuario_get == "Admin") {
        $tipo_usuario = 1;
    }
//echo 'Tipo usuario: ' . $tipo_usuario . '<br>';
    $pass = construir_pass();

//        $from = "test@prueba.com";
    $to = $email;
    $subject = 'Bienvenido a Share Files';
    $message = "Tus usuario es: " . $usuario[0] . " y tu contraseña es: " . $pass;
    $headers = "From: test@prueba.com" . phpversion();

    $busca_usuario = "select correo from users where correo='$email'";
    $respuesta = $conexion->query($busca_usuario);
    $fila = $respuesta->fetch_assoc();
    $correo_db = $fila['correo'];

    if ($email == $correo_db) {
        echo '<strong>El correo ya está registrado!!</strong>';
    } else {
        $query = "INSERT INTO users (usuario,pass,nombre,correo, tipo_usuario) VALUES('$usuario[0]','$pass','$nombre','$email','$tipo_usuario')";
        if ($conexion->query($query) === true) {
            echo ' Usuario creado!!';
            header('refresh:2');
        }
//        if (mail($to, $subject, $message, $headers)) {
//            echo "The email message was sent.";
//        } else {
//            echo 'No se envió el correo again';
//        }
    }
}

function construir_pass($min = 8, $max = 12) {
    $vocales = array("a", "e", "i", "o", "u");
    $consonantes = array("b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "r", "s", "t", "v", "y", "z");
    $numeros = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

    $random_palabras = rand($min, $max); //largo de la palabra
    $random = rand(0, 1, 2); //si empieza por vocal o consonante
    for ($j = 0; $j < $random_palabras; $j++) {//palabra
        switch ($random) {
            case 0: $random_vocales = rand(0, count($vocales) - 1);
                $pass .= $vocales[$random_vocales];
                $random = 1;
                break;
            case 1: $random_consonantes = rand(0, count($consonantes) - 1);
                $pass .= $consonantes[$random_consonantes];
                $random = 2;
                break;
            case 2:
                $random_numeros = rand(0, count($numeros) - 1);
                $pass .= $numeros[$random_numeros];
                $random = 0;
                break;
        }
    }
    return $pass;
}

?>