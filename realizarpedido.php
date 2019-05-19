<?php   
    require 'php/conexion.php';
    require 'php/isLogin.php';
    $id_coti = @$_GET['id_coti'];
    $id_user = @$_GET['id_usr'];
    $query = mysqli_query($con, "SELECT * FROM cotizaciones WHERE ID = ".$id_coti);
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

 ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="img/index/logo.jpg">

        <title>Aki sewua</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/admin.css" rel="stylesheet">
        <link href="css/carousel.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/dialog.css" rel="stylesheet">
        <link href="css/dialog-sandra.css" rel="stylesheet">
        <link href="css/ns-default.css" rel="stylesheet">
        <link href="css/ns-style-growl.css" rel="stylesheet">
        <script src="js/modernizr.custom.js"></script>

    </head>
    <body>
        <header>
            <?php include 'nav.php'; ?>
        </header>

        <main role="main">
            <div class="container" style="margin-top: 2%">
                <h1>Nuevo pedido</h1>
                <form class="needs-validation" action='php/realizarPedido.php' method="POST">
                    <div class="row">
                            <div class="col-md-3">
                            <?php 
                                echo"
                                <img src='php/getImg.php?ID=".$row['ID_Prod']."' style='width: 100%;height: 300px'>
                                "; 
                             ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Escribe la descripción o requerimientos de este pedido</label>
                                    <textarea name='descripcion' class="form-control" placeholder="Descripción"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Escribe el concepto de la venta</label>
                                    <textarea name='concepto' class="form-control" placeholder="Concepto venta"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ingrese la fecha a entregar el producto</label>
                                    <input class="form-control" type="date" name="fecha_entrega" required>
                                    <div class="invalid-feedback">
                                        Este campo es requerido.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ingrese el monto inicial en Dolares</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" name='monto_inicial' aria-label="Amount (to the nearest dollar)" required="" placeholder="Monto inicial">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ingrese el monto total en pesos Dolares</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" name='monto_final' aria-label="Amount (to the nearest dollar)" required="" placeholder="Monto total">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input style="display: none;" name="id_coti" <?php echo "value='".$id_coti."' "; ?> />
                                    <button class="btn btn-primary" type="submit">Aceptar</button>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <hr>
            <!-- FOOTER -->
            <footer class="container">
                <p class="float-right"><a href="#">Arriba</a></p>
                <p>&copy; Developers of Aki sewua, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos y condiciones</a>
                &middot; <a href="#">Mapa</a></p>
            </footer>
        </main>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster 
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="js/vendor/holder.min.js"></script>
        <!-- -->
        <script src="js/grayscale.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/dialogFx.js"></script>
        <script>
            (function() {
                var dlgtrigger = document.querySelector( '[data-dialog]' ),
                somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
                dlg = new DialogFx( somedialog );
                dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );
            })();

        </script>
        <script src="js/notificationFx.js"></script>
        <script>
            <?php if(@$_POST['mensaje']!=""){ ?>
            // create the notification
            var notification = new NotificationFx({
            message : '<p><?php echo @$_POST['mensaje'];?></p>',
            layout : 'growl',
            effect : 'jelly',
            type : 'notice', // notice, warning, error or success

            });

            // show the notification
            notification.show();
            <?php } ?>
        </script>
    </body>
</html>