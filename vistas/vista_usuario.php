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
        <title>Usuario</title>

        <!-- CSS de Bootstrap -->

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../library/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../library/js/javascript.js"></script>

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
                        <li class="nav-item"><a href="../vistas/login.php">Salir </a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <div class="my-content" >
            <!--<div class="container" >--> 
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <div class="myform-top">
                        <div class="myform-top-left">
                            <h2><strong>Lista de Archivos:</strong></h2>
                        </div>
                        <div class="myform-top-right">
                            <i class="fa fa-file"></i>
                        </div>
                    </div>
                    <div class="myform-bottom">
                        <?php
                        require '../controller/control_usuario.php';
                        ?>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <form role='form' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                        <div style="float: right">
                            <table style="align-self: auto">
                                <tr>
                                    <td><input type="file" name="archivo" class="form-control-file" id="fileToUpload"></td>
                                    <td><button type="submit" class="mybtn right" name="btn-subir">Upload</button></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--</div>-->
    </body>
</html>
