<?php

if (isset($_REQUEST["fileToDownload"])) {
    $file = urldecode($_REQUEST["fileToDownload"]);
    $nombreOriginal = $_REQUEST["nombreOriginal"];
    $filepath = "../archivos_locales/" . $file;
//    echo 'NombreOriginal: ' . $nombreOriginal . '<br>';

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Transfer-Encoding: binary');
        header('Content-Type: application/download');
        header('Content-Disposition: attachment; filename="' . $nombreOriginal . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
//        flush(); // Flush system output buffer
//        readfile($filepath);
        $chunkSize = 1024 * 1024;
        $handle = fopen($filepath, 'rb');
        while (!feof($handle)) {
            $buffer = fread($handle, $chunkSize);
            echo $buffer;
            ob_flush();
            flush();
        }
        fclose($handle);
        exit;
    }
}
