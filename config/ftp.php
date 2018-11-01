<?php

//$archivo = $_POST["archivo"];
$ftp_server = "172.16.126.162";
$conn_id = ftp_connect($ftp_server);
$ftp_user_name = "star";
$ftp_user_pass = "star2018";
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (!$login_result) {
    echo 'No se pudo conectar al servidor';
}
?>