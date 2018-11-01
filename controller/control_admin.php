<?php

include '../config/descargar.php';
include '../config/database.php';

session_start();
$user_id = $_SESSION["id_usuario"];

echo '<table id="tablaGeneral" class="table table-bordered"><thead><tr>';
//echo '<tr>';
echo '<th class="oculto">check</th>';
echo '<th> <h4>Propietario </h4></th>';
echo '<th> <h4>Archivo</h4></th>';
echo '<th> <h4>Tamaño</h4></th>';
echo '<th> <h4>Fecha de Carga</h4></th>';
echo '<th><h4>Opciones</h4></th>';
echo '</tr></thead><tbody style="cursor:pointer">';

$files = opendir("../archivos_locales/");

$nombreOriginal = "";
$usuarioRelacionado = "";

while ($file = readdir($files)) {
    $query_muestra_usuarios = "select files.id_archivo, users.nombre as nombre, files.nombre_original as nombre_original, files.size, files.fecha_carga from share_files.files join share_files.users on users.id_user = files.id_usuario where files.encrypt='$file' order by users.nombre";
    $query_muestra_invitados = "SELECT files.id_archivo, invitados.id_invitado AS invitado, files.nombre_original AS nombre_original, files.size, files.fecha_carga FROM share_files.files JOIN share_files.invitados ON invitados.token_invitado = files.token_invitado where files.encrypt='$file'";
    $query_todos_archivos = "select * from files where encrypt='$file'";

    $res_muestra = $conexion->query($query_muestra_usuarios);
    $res_muestra_invitados = $conexion->query($query_muestra_invitados);
    $res_muestra_todos_archivos = $conexion->query($query_todos_archivos);


    if (is_file("../archivos_locales/" . $file)) {
        $todosArchivos = $res_muestra_todos_archivos->fetch_assoc();
        $archivoGeneral = $todosArchivos["nombre_original"];
        $id_archivo_general = $todosArchivos["id_archivo"];
        $tamanoGeneral = $todosArchivos["size"];
        $fechaCargaGeneral = $todosArchivos["fecha_carga"];

        $row_file = $res_muestra->fetch_assoc();
        $nombreOriginal = $row_file["nombre_original"];
        $usuarioRelacionado = $row_file["nombre"];
        $id_archivo = $row_file["id_archivo"];
        $tamano = $row_file["size"];
        $fechaCarga = $row_file["fecha_carga"];

        if ($archivoGeneral == $nombreOriginal) {
            echo "<tr onclick='seleccionar(this, $id_archivo)'>";
            echo "<td class='oculto'><input type='checkbox' name='check[]' id='chk$id_archivo' value='$id_archivo'></td>";
            echo "<td>" . $usuarioRelacionado . " </td>";
            echo '<td>' . $nombreOriginal . '</td>';
            echo '<td>' . $tamano . ' Mb </td>';
            echo '<td>' . $fechaCarga . '</td>';
            echo "<td> <a href='../config/descargar.php?fileToDownload=" . urlencode($file) . "&nombreOriginal=" . $nombreOriginal . "' > Descargar </a></td>";
        } else {
            echo "<tr onclick='seleccionar(this, $id_archivo_general)'>";
            echo "<td class='oculto'><input type='checkbox' name='check[]' id='chk$id_archivo_general' value='$id_archivo_general'></td>";
            echo "<td> Sin Propietario </td>";
            echo '<td>' . $archivoGeneral . '</td>';
            echo '<td>' . $tamanoGeneral . ' Mb </td>';
            echo '<td>' . $fechaCargaGeneral . '</td>';
            echo "<td> <a href='../config/descargar.php?fileToDownload=" . urlencode($file) . "&nombreOriginal=" . $archivoGeneral . "' > Descargar </a></td>";
        }

        foreach ($res_muestra_invitados as $row_file_invi) {
            $nombreOriginal = $row_file_invi["nombre_original"];
            $invitado_relacionado = $row_file_invi["invitado"];
            $id_archivo = $row_file_invi["id_archivo"];
            $tamano = $row_file["size"];
            $fechaCarga = $row_file["fecha_carga"];

            echo "<tr onclick='seleccionar(this, $id_archivo)'>";
            echo "<td class='oculto'><input type='checkbox' name='check[]' id='chk$id_archivo' value='$id_archivo'></td>";
            echo "<td>" . $invitado_relacionado . " </td>";
            echo "<td>" . $nombreOriginal . "</td>";
            echo '<td>' . $tamano . ' Mb</td>';
            echo '<td>' . $fechaCarga . '</td>';
            echo "<td> <a href='../config/descargar.php?fileToDownload=" . urlencode($file) . "&nombreOriginal=" . $nombreOriginal . "' > Descargar </a></td>";
        }
        echo '</tr>';
    } else {
        if ($file != "." && $file != "..") {
            echo "<tr'>";
            echo "<td class='oculto'></td>";
            echo "<td> --- </td>";
            echo "<td>[" . $file . "]</td>";
            echo "<td> --- </td>";
            echo "<td> --- </td>";
            echo "<td> Carpeta </a></td>";
            echo '</tr>';
        }
    }
}
echo '</tbody></table><br>';


if (isset($_POST['btn-subir'])) {

    $token_archivo = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789" . uniqid());
    $nombreArchivo = $_FILES["archivo"]["name"];
    $nombreTmpArchivo = $_FILES["archivo"]["tmp_name"];
    $trozoNombreArchivo = explode("/", $nombreTmpArchivo);
    $nombreArchivoSistema = end($trozoNombreArchivo);
    $tamañoArchivo = $_FILES["archivo"]["size"];
    $tamañoTotal = round((($tamañoArchivo) / 1000000), 2);
    $band = false;
    $trozos = explode(".", $nombreArchivo);
    $ext = end($trozos);
//    echo 'Nombre: ' . $nombreArchivo . '<br>';
//    echo 'Ext: ' . $ext . '<br>';
    $archivoEncriptado = sha1($nombreArchivo);
    $fecha_subida = date("Y-m-d H:i:s");

    $query_busca_file = "select nombre_original from files";
    $res_busca_file = $conexion->query($query_busca_file);
    foreach ($res_busca_file as $row) {
        $nombre_original = $row["nombre_original"];
        if ($nombreArchivo == $nombre_original) {
            $band = true;
        }
    }
    if ($band) {
        echo 'El archivo ya existe!!<br>';
    } else {

//    echo 'tamaño: ' . $tamañoTotal . '<br>'; echo '<td>' . $tamano . '</td>';
//    $formatos = array('.jpg', '.txt', '.html', '.docx', '.php', '.xml', '.pdf', '.rar', '.zip');


        $query_file = "insert into files (nombre_original, nombre_sistema, encrypt, token_archivo, fecha_carga, id_usuario,size) values('$nombreArchivo','$nombreArchivoSistema','$archivoEncriptado', '$token_archivo', '$fecha_subida', '$user_id', '$tamañoTotal')";
        if ($conexion->query($query_file) === true) {
            $add = "../archivos_locales/" . $archivoEncriptado;
            if (move_uploaded_file($nombreTmpArchivo, $add)) {
                chmod($add, 0666);
                header('refresh:2');
                echo " Ha sido subido satisfactoriamente<br>";
            } else {
                echo "Error al subir el archivo<br>";
            }
        } else {
            echo 'Error: ' . $consulta . '<br>' . $conexion->error;
        }
    }
}
if (isset($_POST['btn-eliminar'])) {
    $path = "../archivos_locales/";
    $files = opendir($path);
    $checks = $_REQUEST['check'];
    if (count($checks) > 1 || count($checks) < 1) {
        echo '<script>alert("Seleccione solo un Archivo!!")</script>';
    } else {
        for ($x = 0; $x < count($checks); $x++) {
            $id_archivo = $checks[$x];
            $query_busca_file = "select files.encrypt from files where id_archivo='$id_archivo'";
            $query_elimina_file = "delete from files where id_archivo='$id_archivo'";
            $res_busca_file = $conexion->query($query_busca_file);
            while ($archivo = readdir($files)) {
                foreach ($res_busca_file as $file) {
                    $encrypt = $file["encrypt"];
                    if ($archivo == $encrypt) {
                        if (unlink($path . $archivo)) {
                            if ($conexion->query($query_elimina_file)) {
                                echo 'Eliminado Correctamente!!<br>';
                                header('refresh:2');
                            }
                        } else {
                            echo 'NO se pudo borrar localmente<br>';
                        }
                    }
                }
            }
        }
    }
}

if (isset($_POST["btn-token-archivo"])) {
    $files = opendir("../archivos_locales/");
    $checks = $_REQUEST['check'];
//    count($checks) > 1 ||
    if (count($checks) < 1) {
        echo '<script>alert("Seleccione solo un Archivo!!")</script>';
    } else {
        for ($x = 0; $x < count($checks); $x++) {
            $id_archivo = $checks[$x];
            $query_busca_file = "select files.nombre_original, files.encrypt, files.token_archivo from files where id_archivo='$id_archivo'";
            $res_busca_file = $conexion->query($query_busca_file);
            while ($archivo = readdir($files)) {
                foreach ($res_busca_file as $file) {
                    $nombre_original = $file["nombre_original"];
                    $token = $file["token_archivo"];
                    $encrypt = $file["encrypt"];
                    if ($archivo == $encrypt) {
                        echo '<strong>Archivo: </strong>' . $nombre_original . '<br><strong>Token de descarga:</strong> ' . $token . '<br><br>';
                    }
                }
            }
        }
    }
}
?>