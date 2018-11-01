<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../library/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../library/js/javascript.js"></script>

        <link rel="stylesheet" href="../library/css/bootstrap.min.css">
        <link rel="stylesheet" href="../library/font-awesome/css/font-awesome.min.css"> <!--Iconos--> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
        <link rel="stylesheet" href="../library/css/custom.css">
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <?php
//        require_once("../config/ftp-connect.php");
//        getLista();
        include '../config/funciones.php';
        $ip = obtenerIP();
        $dns = obtenDNS();
        
        echo 'ip: ' . $ip . '<br>';
        echo 'dns: ' . $dns . '<br>';
        ?>
    </body>
</html>