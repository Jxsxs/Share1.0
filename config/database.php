<?php

$host = "localhost";
$user = "root";
$pass = "star2018";
$db = "share_files";

$conexion = mysqli_connect($host, $user, $pass, $db);

if ($conexion === false) {
//    echo 'Hubo un error en la conexion';
//    exit();
    die("Error en la conexion " . mysqli_connect_error());
}
?>
