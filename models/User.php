<?php

include ("../config/database.php");

function insertaUsuario($usuario, $pass, $nombre, $email, $tipo_usuario) {
    $query = "INSERT INTO users (usuario,pass,nombre,correo, tipo_usuario) VALUES('$usuario[0]','$pass','$nombre','$email','$tipo_usuario')";
    if ($conexion->query($query) === true) {
        echo 'Usuario creado!!';
    } else {
        echo 'Error al crear usuario';
    }
}



?>
