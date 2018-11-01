<?php

include '../config/database.php';

session_start();
$user_id = $_SESSION["id_usuario"];

echo '<table id="tablaGeneral"><thead>';
//echo '<tr>';
echo '<th class="oculto">check</th>';
echo '<th> <h4>Id</h4></th>';
echo '<th> <h4>Archivo</h4></th>';
echo '<th> <h4>Tamaño</h4></th>';
echo '<th> <h4>Fecha de Carga</h4></th>';
echo '<th><h4>Opciones</h4></th>';
echo '</thead><tbody style="cursor:pointer">';

$files = opendir("../archivos_locales/");

$nombreOriginal = "";
$usuarioRelacionado = "";

while ($file = readdir($files)) {
    $query_muestra_usuarios = "select files.id_archivo, users.nombre as nombre, files.nombre_original as nombre_original, files.size, files.fecha_carga from share_files.files join share_files.users on users.id_user = files.id_usuario where files.encrypt='$file' and users.id_user='$user_id' order by files.nombre_original desc";
    $res_muestra = $conexion->query($query_muestra_usuarios);
    if (!is_dir($file)) {
        foreach ($res_muestra as $row_file) {
            $nombreOriginal = $row_file["nombre_original"];
            $id_archivo = $row_file["id_archivo"];
            $size = $row_file["size"];
            $fechaCarga = $row_file["fecha_carga"];
            echo "<tr onclick='seleccionar(this, $id_archivo)'>";
            echo "<td class='oculto'><input type='checkbox' name='check[]' id='chk$id_archivo' value='$id_archivo'></td>";
            echo "<td>" . $id_archivo . " </td>";
            echo '<td>' . $nombreOriginal . '</td>';
            echo '<td>' . $size . ' Mb</td>';
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
//        echo 'Temp: ' . $nombreArchivoSistema . '<br>';
    $tamañoArchivo = $_FILES["archivo"]["size"];
    $tamañoTotal = round((($tamañoArchivo) / 1000000), 2);
//    $formatos = array('.jpg', '.txt', '.html', '.docx', '.php', '.xml', '.pdf', '.rar', '.zip');
    $trozos = explode(".", $nombreArchivo);
    $ext = end($trozos);
//    echo ' ext: ' . $ext . '<br>';

    $archivoEncriptado = sha1($nombreArchivo);
    $fecha_subida = date("Y-m-d H:i:s");

    $query_file = "insert into files (nombre_original, nombre_sistema, encrypt, token_archivo, fecha_carga, id_usuario, size) values('$nombreArchivo','$nombreArchivoSistema','$archivoEncriptado', '$token_archivo', '$fecha_subida', '$user_id', '$tamañoTotal')";
    if ($conexion->query($query_file) === true) {
        $add = "../archivos_locales/" . $archivoEncriptado;
        if (move_uploaded_file($nombreTmpArchivo, $add)) {
            chmod($add, 0666);
            echo " Ha sido subido satisfactoriamente<br>";
            header('refresh:2');
        } else {
            echo "Error al subir el archivo<br>";
        }
    } else {
        echo 'Error: ' . $consulta . '<br>' . $conexion->error;
    }
}
//    else {
//        echo 'Archivo no valido ';
//    }
?>
