<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrador</title>

        <!-- CSS de Bootstrap -->

        <script type="text/javascript" src="../library/DataTables/datatables.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../library/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../library/js/javascript.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="../library/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="../library/css/bootstrap.min.css">
        <link rel="stylesheet" href="../library/font-awesome/css/font-awesome.min.css"> <!--Iconos--> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
        <link rel="stylesheet" href="../library/css/custom.css">
        <link rel="stylesheet" href="../library/css/css.css">


    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#navMuestra" aria-controls="navMuestra">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="../img/logo.png" width="55" height="35" class="d-inline-block align-top" alt="Strar TV">
                    </a>
                </div>
                <div id="navMuestra" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="vista_ver_invitados.php">Ver Invitados</a></li>
                        <li class="nav-item"><a href="vista_ver_usuarios.php">Ver Usuarios</a></li>
                        <li class="nav-item"><a href="login.php">Salir </a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <div class="my-content" >
            <div class="myform-top">
                <div class="myform-top-left">
                </div>
            </div>
            <div class="myform-bottom">
                <form role='form' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                    <div style="float: right">
                        <input type="text" id="txt_buscar" class="form-control" placeholder="Buscar archivo" style="width:280px"><br>
                    </div>
                    <!--<div class="table-responsive">-->
                    <?php
                    include '../controller/control_admin.php';
                    ?>
                    <!--</div>-->
                    <!--<button type="submit" class="mybtn right" name="btn-descarga" id="btn-descarga">Descargar</button>-->
                    <button type="submit" class="mybtn right" name="btn-eliminar" id="btn-eliminar">Eliminar</button>
                    <button type="submit" class="mybtn right" name="btn-token-archivo" id="btn-token-archivo">Token Archivo</button>

                </form>
            </div>
            <br>
            <form role='form' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                <div style="float: right">
                    <table style="align-self: auto">
                        <tr>
                            <td><input type="file" name="archivo" class="form-control-file" id="fileToUpload"></td>
                            <td><button type="submit" class="mybtn right" name="btn-subir" >Upload</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </body>
</html>
