<?php

include "../config/database.php";

$query_usuarios = "SELECT 
    users.id_user AS 'id',
    users.usuario AS 'user',
    users.tipo_usuario AS 'tipo',
    users.pass,
    COUNT(files.id_usuario) AS 'count'
FROM
    share_files.users
        JOIN
    share_files.files ON users.id_user = files.id_usuario
GROUP BY users.id_user , users.usuario , users.tipo_usuario, users.pass";

//$query_usuarios = "SELECT 
//    users.id_user AS 'id',
//    users.nombre AS 'user',
//    users.tipo_usuario AS 'tipo'
//FROM
//    share_files.users
//";

$query_todos_usuarios = "select * from users";

$res_query_todos_usuarios = $conexion->query($query_todos_usuarios);
$res_query_usuarios = $conexion->query($query_usuarios);

echo "<table id='tablaGeneral'> ";
echo '<tr>';
echo '<td><h4><strong>Id</strong></h4></td>';
echo '<td><h4><strong>User</strong></h4></td>';
echo '<td><h4><strong>Pass</strong></h4></td>';
echo '<td><h4><strong>Tipo</strong></h4></td>';
echo '<td><h4><strong>Files</strong></h4></td>';
echo '<td></td>';
echo '</tr>';



foreach ($res_query_todos_usuarios as $usuarioGlobal) {
    $idUsuarioGeneral = $usuarioGlobal["id_user"];
    $usuarioGeneral = $usuarioGlobal["usuario"];
    $tipoGeneral = $usuarioGlobal["tipo_usuario"];
    $contrasenaGeneral = $usuarioGlobal["pass"];
    $tipoStringGeneral = "";
    $band = false;
    foreach ($res_query_usuarios as $fila) {
        $id = $fila['id'];
        $usuario = $fila['user'];
        $tipo = $fila['tipo'];
        $contrasena = $fila["pass"];
        $cont = $fila['count'];
        $tipo_string;
        if ($tipo == 1) {
            $tipo_string = "Admin";
        } else {
            $tipo_string = "Usuario";
        }

        if ($tipoGeneral == 1) {
            $tipoStringGeneral = "Admin";
        } else {
            $tipoStringGeneral = "Usuario";
        }
        if ($id == $idUsuarioGeneral) {
            echo '<tr>';
            echo "<td>$id</td>";
            echo "<td>$usuario</td>";
            echo "<td>$contrasena</td>";
            echo "<td>$tipo_string</td>";
            echo "<td>$cont</td>";
            echo "<td><a href='../config/eliminar.php?id_usuario=$id'>Eliminar</a></td>";
            echo '</tr>';
            $band = true;
        }
    }
    if ($band == false) {
        echo '<tr>';
        echo "<td>$idUsuarioGeneral</td>";
        echo "<td>$usuarioGeneral</td>";
        echo "<td>$contrasenaGeneral</td>";
        echo "<td>$tipoStringGeneral</td>";
        echo "<td>0</td>";
        echo "<td><a href='../config/eliminar.php?id_usuario=$idUsuarioGeneral'>Eliminar</a></td>";
        echo '</tr>';
    }
}
echo '</table>';
