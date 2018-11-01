<?php

include ("../config/database.php");
if (isset($_POST["btn-token"])) {

    $rand_part = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789" . uniqid());
    echo '<strong> Token: </strong> ' . $rand_part . '<br>';

    $consulta = "insert into invitados(token_invitado, usado) values('$rand_part','0')";

    if ($conexion->query($consulta) === true) {
    } else {
        echo 'Error: ' . $consulta . '<br>' . $conexion->error;
    }
}
?>