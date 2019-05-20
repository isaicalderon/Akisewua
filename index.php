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
		<script src="js/modernizr.custom.js"></script>
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>

		<main role="main">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="first-slide" src="img/index/slider1.jpg" alt="First slide">
						<div class="container">
							<div class="carousel-caption">
								<div class="text-black">
									<img class='' src="img/index/logo.jpg" width="200px" height="200px" style="border-radius: 100px;">
									<h1>¿Quiénes somos?</h1>
									<p>Somos una pequeña tienda que busca fomentar la cultura Yaqui en las personas y dar a conocer al mundo toda la riqueza que puede ofrecer la cultura Yaqui.</p>
								</div>
								<p><a class="btn btn-lg btn-primary" href="#" role="button">Comprar</a></p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="second-slide" src="img/index/slider3.jpg" alt="Second slide">
						<div class="container">
							<div class="carousel-caption text-black">
								<h1>Misión</h1>
								<p>La conservación y difusión de la cultura indígena yaqui de Sonora, el aprovechamiento sustentable de los recursos naturales de su territorio y la organización colectiva del trabajo artesanal.</p>
								<!--
								<p>
									<a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>
								</p>
								-->
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="third-slide" src="img/index/slider2.jpg" alt="Third slide">
						<div class="container">
							<div class="carousel-caption text-black">
								<h1>Visión</h1>
								<p>Ser un medio de consolidación del trabajo organizado como artesanas y artesanos indígenas de Sonora y alcanzar un posicionamiento efectivo de la Cultura Indígena en la conciencia colectiva de la sociedad..</p>
								<!--
								<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
								-->
							</div>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
				</a>
			</div>


			<!-- Marketing messaging and featurettes
			================================================== -->
			<!-- Wrap the rest of the page in another container to center all the content. -->

			<div class="container marketing">
				<h1>Productos populares</h1>
				<br>
				<!-- Three columns of text below the carousel -->
				<div class="row">
					<div class="col-lg-4">
						<img class="rounded-circle border-2px" src="img/index/img4.jpg" alt="" width="140" height="140">
						<h2>Artesanía</h2>
						<p>Descripción.</p>
						<p><a class="btn btn-info border-2px" href="#" role="button">Ver más productos &raquo;</a></p>
					</div><!-- /.col-lg-4 -->
					<div class="col-lg-4">
						<img class="rounded-circle border-2px" src="img/index/img5.jpg" alt="" width="140" height="140">
						<h2>Ropa</h2>
						<p>Descripción.</p>
						<p><a class="btn btn-info" href="#" role="button">Ver más productos &raquo;</a></p>
					</div><!-- /.col-lg-4 -->
					<div class="col-lg-4">
						<img class="rounded-circle" src="img/index/img6.jpg" alt="" width="140" height="140">
						<h2>Mascaras</h2>
						<p>Descripción.</p>
						<p><a class="btn btn-info" href="#" role="button">Ver más productos &raquo;</a></p>
					</div><!-- /.col-lg-4 -->
				</div><!-- /.row -->


				<!-- START THE FEATURETTES 

				<hr class="featurette-divider">

				<div class="row featurette">
					<div class="col-md-7">
						<h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
						<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
					</div>
						<div class="col-md-5">
						<img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
					</div>
				</div>

				<hr class="featurette-divider">

				<div class="row featurette">
					<div class="col-md-7 order-md-2">
						<h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
						<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
					</div>
					<div class="col-md-5 order-md-1">
						<img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
					</div>
				</div>

				<hr class="featurette-divider">

				<div class="row featurette">
					<div class="col-md-7">
						<h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
						<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
					</div>
					<div class="col-md-5">
						<img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
					</div>
				</div>

				<hr class="featurette-divider">

				/END THE FEATURETTES -->

			</div><!-- /.container -->
			

			<!-- FOOTER -->
			<footer class="container">
				<p class="float-right"><a href="#">Arriba</a></p>
				<p>&copy; Aki sewua, Inc. Developers 2019 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos y condiciones</a>
					&middot; <a href="mapa.php">Mapa</a></p>
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
	    <script>
        $(document).ready(function(){
            var cont = 0;
            $("#ins").click(function(){
               cont = cont+1;
                if(cont == 5){
                    cont = 0;
                    $(this).html("Modo de Administrador");
                    $("#log1").attr("placeholder","Usuario");
                    $("#log1").attr("type","text");
                    $(".xd").attr("value","1");
                }
            });
        });
    </script>
    <script src="js/notificationFx.js"></script>
	<script>
		
        <?php if(@$_POST['msj']!=""){ ?>
        // create the notification
        var notification = new NotificationFx({
            message : '<p><?php echo @$_POST['msj'];?></p>',
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
