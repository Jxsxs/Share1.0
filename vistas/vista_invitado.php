<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Invitado</title>

        <!-- CSS de Bootstrap -->

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../library/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../library/js/javascript.js"></script>

        <link rel="stylesheet" href="../library/css/bootstrap.min.css">
        <link rel="stylesheet" href="../library/font-awesome/css/font-awesome.min.css"> <!--Iconos--> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
        <link rel="stylesheet" href="../library/css/custom.css">
    </head>
    <?php
    include '../controller/control-genera-invitado.php';
    ?>
    <body>   
        <nav class="navbar navbar-inverse navbar-static-top">
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
                        <li><a href="../vistas/login.php">Salir</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <div class="my-content" >
            <div class="container" > 
                <div class="row">
                    <div class="col-sm-12" >
                        <img src="../img/logo.png" class="img-responsive center-block">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                        <div class="myform-top">
                            <div class="myform-top-left">
                                <h2><strong>Datos:</strong></h2>
                            </div>
                            <div class="myform-top-right">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="myform-bottom">
                            <form role='form' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                                <input type="file" name="archivo_invitado" class="form-control-file" id="fileToUpload" onchange="progressBar()">
                                <button type="submit" class="mybtn right" name="btn-subir-invitado">Subir</button>
                            </form>
                            <br>
                            <hr>
                            <form role='form' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                                <div id="muestra_oculta2"> <h3><strong>Descarga</strong></h3></div>
                                <hr>
                                <div id="respuesta2" style="display:none" >
                                    <div class="input-group-btn">
                                        <input type="text" id="txt_token_archivo" name="txt_token_archivo" class="form-control" placeholder="Token de archivo">
                                        <button type="submit" class="mybtn right" name="btn-busca-archivo">Buscar Archivo</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            include '../controller/control_invitado.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>