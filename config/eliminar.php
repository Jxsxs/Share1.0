<?php

include '../config/database.php';
if (isset($_REQUEST["id_usuario"])) {
    $id_usuario = $_REQUEST["id_usuario"];
//    echo 'id: ' . $id_usuario . '<br>';
    $query_elimina_user = "delete from users where id_user='$id_usuario'";
    if ($conexion->query($query_elimina_user) === true) {
        echo 'Eliminado con exito';
        header("refresh:2; url= ../vistas/vista_ver_usuarios.php");
    } else {
        echo 'No se pudo eliminar el usuario';
        header("refresh:2; url= ../vistas/vista_ver_usuarios.php");
    }
}


if (isset($_REQUEST["id_invitado"])) {
    $id_invitado = $_REQUEST["id_invitado"];
    
    $query_elimina_invitado = "delete from invitados where id_invitado='$id_invitado'";
    
    if ($conexion->query($query_elimina_invitado)) {
        echo 'Eliminado con exito';
        header("refresh:2; url= ../vistas/vista_ver_invitados.php");
    }else{
        echo 'No se pudo eliminar el usuario';
        header("refresh:2; url= ../vistas/vista_ver_invitados.php");
    }
}

