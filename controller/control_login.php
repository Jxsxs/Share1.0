<?php

include '../config/database.php';
include './control_admin.php';
include '../config/funciones.php';


$usuario = $_POST["form-username"];
$pass = $_POST["form-password"];

$fecha_actual = date("Y-m-d H:i:s");
$ip_ingreso = obtenerIP();
$descripcion = obtenDNS();

if (isset($_POST["btn-usuario"])) {

    $userok = "";
    $passok = "";
    $tipo_user = "";
    $intento_ingreso_usuario = 0;

    $consulta = "select id_user, usuario, pass, tipo_usuario from users where usuario='$usuario'";

    $result = $conexion->query($consulta);
    if ($usuario == "" || $pass == "") {
        echo 'Ingrese los datos!!';
    } else {
        foreach ($result as $row) {
            $userok = $row["usuario"];
            $passok = $row["pass"];
            $tipo_user = $row["tipo_usuario"];
            $id_usuario = $row["id_user"];

            if ($usuario == $userok && $pass == $passok) {
                if ($tipo_user == 1) {
                    session_start();
                    $_SESSION["id_usuario"] = $id_usuario;
                    $consulta_log = "insert into logs (id_usuario, ip_ingreso, fecha_ingreso, descripcion) values ('$id_usuario', '$ip_ingreso', '$fecha_actual', '$descripcion')";
                    if ($conexion->query($consulta_log) === true) {
                        header("Location: vista_admin.php");
                    } else {
                        echo 'Error al ingresar';
                    }
                } else {
                    $consulta_log = "insert into logs (id_usuario, ip_ingreso, fecha_ingreso, descripcion) values ('$id_usuario', '$ip_ingreso', '$fecha_actual', '$descripcion')";
                    if ($conexion->query($consulta_log) === true) {
                        session_start();
                        $_SESSION["id_usuario"] = $id_usuario;
                        header("Location: vista_usuario.php");
                    }
                }
            } else {
                if ($usuario != $userok) {
                    $consulta_fallos = "insert into registro_fallos (fecha_intento, intento, ip_intento, descripcion_falla, usuario, pass) values ('$fecha_actual', $intento_ingreso_usuario, '$ip_ingreso', 'Usuario no existe en la DB', '$usuario','$pass')";
                    if ($conexion->query($consulta_fallos)) {
                        echo 'El usuario no existe!';
                    } else {
                        echo 'no se ejecuta consulta de user<br>';
                    }
                }if ($pass != $passok) {
                    $consulta_fallos = "insert into registro_fallos (fecha_intento, intento, ip_intento, descripcion_falla, usuario, pass) values ('$fecha_actual', $intento_ingreso_usuario, '$ip_ingreso', 'Contraseña incorrecta', '$usuario','$pass')";
                    if ($conexion->query($consulta_fallos)) {
                        echo 'Contraseña incorrecta';
                    } else {
                        echo 'no se ejecuta consulta de pass<br>';
                    }
                }
                $intento_ingreso_usuario += 1;
            }
        }
    }
}
if (isset($_POST["btn-invitado"])) {
    $token = $_POST["form-usertoken"];
    $tokenok = "";
    $consulta2 = "select token_invitado, usado from invitados where token_invitado='$token'";
    //invitado por token 
    $result2 = $conexion->query($consulta2);
    foreach ($result2 as $row) {
        $tokenok = $row["token_invitado"];
        $usado = $row["usado"];
        if ($token == $tokenok) {
            if ($usado == 0) {
                session_start();
                $_SESSION["token_invitado"] = $token;

                $consulta_log = "insert into logs (token_invitado, ip_ingreso, fecha_ingreso, descripcion) values ('$token', '$ip_ingreso', '$fecha_actual', '$descripcion')";
                if ($conexion->query($consulta_log) === true) {
                    header("Location: vista_invitado.php");
                } else {
                    echo 'Error al ingresar';
                }
            } else {
//                $consulta_fallos = "insert into registro_fallos (fecha_intento, intento, token_invitado, ip_intento, descripcion_falla) values ('$fecha_actual', '1', $token, '$ip_ingreso', 'El token esta usado')";
//                if ($conexion->query($consulta_fallos) === true) {
                echo 'Ya no puede usar este Token. Ocupado <br>';
//                } else {
//                    echo 'error al insertar';
//                }
            }
        } else {
//            $consulta_fallos = "insert into registro_fallos (fecha_intento, intento, token_invitado, ip_intento, descripcion_falla) values ('$fecha_actual', '1', $token, '$ip_ingreso', 'El token no se encuentra en la DB')";
            echo 'Este token no existe';
        }
    }
}

function validaEmail($correo) {
    if (strstr($correo, '@')) {
        return true;
    } else {
        return false;
    }
}
