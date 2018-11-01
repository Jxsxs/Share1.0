<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Login</title>

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../library/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../library/js/javascript.js"></script>

        <link rel="stylesheet" href="../library/css/bootstrap.min.css">
        <link rel="stylesheet" href="../library/font-awesome/css/font-awesome.min.css"> <!--Iconos--> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
        <link rel="stylesheet" href="../library/css/custom.css">


    </head>
    <body onload="noAtras()">
        <div class="my-content" >
            <div class="container" > 
                <div class="row">
                    <div class="col-sm-12">
                        <img src="../img/logo.png" class="img-responsive center-block" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                        <div class="myform-top">
                            <div class="myform-top-left">
                                <h2><strong>Login:</strong></h2>
                            </div>
                            <div class="myform-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="myform-bottom">
                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="">
<!--                                <div class="">-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" name="form-username" placeholder="example@site.algo" class="form-control" id="form-username">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input type="password" name="form-password" placeholder="Contraseña" class="form-control" id="form-password">
                                    </div>
                                    <div>
                                        <button type="submit" class="mybtn right" name="btn-usuario">Entrar</button>
                                    </div>
<!--                                </div>-->
                                <hr>
                                <div id="muestra_oculta2"> <h3><strong>Invitado</strong></h3></div>
                                <div id="respuesta2" style="display:none" >
                                    <div class="input-group">
                                        <span class="input-group-addon">Token</span>
                                        <input type="text" name="form-usertoken" placeholder="Ingrese Token..." class="form-control" id="form-usertoken">
                                    </div>
                                    <div>
                                        <button type="submit" class="mybtn right" name="btn-invitado">Entrar</button>
                                    </div>
                                </div>
                                <hr>

                            </form>
                            <?php
                            include('../controller/control_login.php');
                            include '../controller/control_invitado.php';
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>