<?php require 'php/isLogin.php'; ?>
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
        <link href="css/modal-login.css" rel="stylesheet">
        <link href="css/dialog.css" rel="stylesheet">
        <link href="css/dialog-sandra.css" rel="stylesheet">
        <link href="css/ns-default.css" rel="stylesheet">
        <link href="css/ns-style-growl.css" rel="stylesheet">
        <link href="css/contacto.css" rel="stylesheet">

        <script src="js/modernizr.custom.js"></script>

    </head>

<body>
    <header>
        <?php include 'nav.php'; ?>
    </header>

    <main role="main">

        <center>
            <form action="php/addContacto.php" method="POST" class="form-signin">
                <img class="mb-4" src="img/index/logo.jpg" alt="" width="200" height="200" style="border-radius: 100px">
                <h1 class="h3 mb-3 font-weight-normal">Contactanos</h1>
                
                <label for="inputEmail" class="sr-only">Email</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                
                <textarea name="desc" required class="form-control" placeholder="Descripción"></textarea><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
            </form>
        </center>
        <!-- FOOTER -->
        <footer class="container">
            <p class="float-right"><a href="#">Arriba</a></p>
            <p>&copy; Developers of Aki sewua, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos y condiciones</a>
            &middot; <a href="mapa.php">Mapa</a></p>
        </footer>
    </main>

   
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