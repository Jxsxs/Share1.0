<?php

include '../config/database.php';

$consulta_invitados = "SELECT 
    invitados.id_invitado as 'id',
    invitados.token_invitado as 'token',
    COUNT(files.token_invitado) AS 'archivos'
FROM
    share_files.invitados
        JOIN
    share_files.files ON invitados.token_invitado = files.token_invitado
GROUP BY invitados.id_invitado , invitados.token_invitado";

$query_todos_invitados = "select * from invitados";

$res_consulta_invitados = $conexion->query($consulta_invitados);
$res_query_todos_invitados = $conexion->query($query_todos_invitados);


echo "<table id='tablaGeneral'>";
echo '<tr>';
echo '<td><h4><strong>Id</strong></h4></td>';
echo '<td><h4><strong>Token</strong></h4></td>';
echo '<td><h4><strong>Usado</strong></h4></td>';
echo '<td><h4><strong>Files</strong></h4></td>';
echo '<td></td>';
echo '</tr>';

foreach ($res_query_todos_invitados as $invitadoGlobal) {
    $idInvitadoGeneral = $invitadoGlobal["id_invitado"];
    $tokenInvitadoGeneral = $invitadoGlobal["token_invitado"];
    $usadoGeneral = $invitadoGlobal["usado"];
    $usadoString = "";
    $band = false;
    foreach ($res_consulta_invitados as $fila) {
        $id = $fila['id'];
        $token_invitado = $fila['token'];
        $cant_archivos = $fila['archivos'];

        if ($usadoGeneral == 1) {
            $usadoString = "Si";
        } else {
            $usadoString = "No";
        }

        if ($id == $idInvitadoGeneral) {
            echo '<tr>';
            echo "<td>$id</td>";
            echo "<td>$token_invitado</td>";
            echo "<td>$cant_archivos</td>";
            echo "<td>$usadoString</td>";
            echo "<td>$cont</td>";
            echo "<td><a href='../config/eliminar.php?id_invitado=$id'>Eliminar</a></td>";
            echo '</tr>';
            $band = true;
        }
    }
    if ($usadoGeneral == 1) {
        $usadoString = "Si";
    } else {
        $usadoString = "No";
    }
    if ($band == false) {
        echo '<tr>';
        echo "<td>$idInvitadoGeneral</td>";
        echo "<td>$tokenInvitadoGeneral</td>";
        echo "<td>$usadoString</td>";
        echo "<td>0</td>";
        echo "<td><a href='../config/eliminar.php?id_invitado=$idInvitadoGeneral'>Eliminar</a></td>";
        echo '</tr>';
    }
}
echo '</table>';
