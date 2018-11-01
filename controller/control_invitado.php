<?php

include '../config/ftp.php';
include '../config/database.php';

session_start();
$token_invitado = $_SESSION["token_invitado"];
$cons = "update invitados set usado=1 where token_invitado='$token_invitado'";
mysqli_query($conexion, $cons);

$contador_archivos = 0;
if (isset($_POST["btn-subir-invitado"])) {

    $token_archivo = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789" . uniqid());
    $nombreArchivo = $_FILES["archivo_invitado"]["name"];
    $nombreTmpArchivo = $_FILES["archivo_invitado"]["tmp_name"];
    $trozoNombreArchivo = explode("/", $nombreTmpArchivo);
    $nombreArchivoSistema = end($trozoNombreArchivo);
//        echo 'Temp: ' . $nombreArchivoSistema . '<br>';
    $tamañoArchivo = $_FILES["archivo"]["size"];
//    echo $user_id;
//    echo 'tamaño: ' . ($tamañoArchivo) / 1000 . '<br>';
//    $formatos = array('.jpg', '.txt', '.html', '.docx', '.php', '.xml', '.pdf', '.rar', '.zip');
    $trozos = explode(".", $nombreArchivo);
    $ext = end($trozos);
//    echo ' ext: ' . $ext . '<br>';

    $archivoEncriptado = sha1($nombreArchivo);
    $fecha_subida = date("Y-m-d H:i:s");

    $query_file = "insert into files (nombre_original, nombre_sistema, encrypt, token_archivo, fecha_carga, token_invitado) values('$nombreArchivo','$nombreArchivoSistema','$archivoEncriptado', '$token_archivo', '$fecha_subida', '$token_invitado')";
    if ($conexion->query($query_file) === true) {
        if ($contador_archivos <= 2) {
            $add = "../archivos_locales/" . $archivoEncriptado;
            if (move_uploaded_file($nombreTmpArchivo, $add)) {
                chmod($add, 0666);
                echo " Ha sido subido satisfactoriamente<br>";
                $contador_archivos++;
            } else {
                echo "Error al subir el archivo<br>";
            }
        } else {
            echo 'No puede subir mas archivos';
        }
    } else {
        echo 'Error: ' . $conexion->error;
    }
}
//    else {
//        echo 'Archivo no valido ';
//    }

if (isset($_POST["btn-busca-archivo"])) {
    $files = opendir("../archivos_locales/");
    $band = false;
    $token_archivo_dado = $_POST["txt_token_archivo"];
    $query_busca_file_token = "select files.nombre_original, files.encrypt from files where files.token_archivo='$token_archivo_dado'";
    $res_busca_file_token = $conexion->query($query_busca_file_token);

    while ($archivo = readdir($files)) {
        foreach ($res_busca_file_token as $fila) {
            $nombre_original = $fila["nombre_original"];
            $encrypt = $fila["encrypt"];
            if ($archivo == $encrypt) {
                echo "<strong>Archivo:</strong> " . $nombre_original . "<strong><a href='../config/descargar.php?fileToDownload=" . urlencode($archivo) . "&nombreOriginal=" . $nombre_original . "' > Descargar </a>";
                $band = true;
            } 
        }
    }
    if (!$band) {
        echo 'El archivo no existe!!<br>';
    }
}
?>