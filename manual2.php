<?php 
	require 'php/conexion.php';
	require 'php/isLogin.php';
	if ($status) {
		if ($_SESSION['root'] != 1) {
			header("Location: manual.php");
		}
	}

 ?>	

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="img/index/logo.jpg">

		<title>Aki sewua </title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/carousel.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/dialog.css" rel="stylesheet">
	    <link href="css/dialog-sandra.css" rel="stylesheet">
	    <link href="css/ns-default.css" rel="stylesheet">
    	<link href="css/ns-style-growl.css" rel="stylesheet">
    	<link href="css/form-validation.css" rel="stylesheet">
    	
		<script src="js/modernizr.custom.js"></script>
	    <style type="text/css">
	    	video { 
			   width:100%;
			   max-width:500px;
			   height:auto;
			   border: 2px solid #ccc;
			}
	    </style>
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>

		<main role="main">
			<div class="container" style="margin-top: 2%">
				<h2>Manual de Administrador</h2>
				<div id="accordion">
					
					<div class="card">
						<div class="card-header" id="headingTwo">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									1. Iniciar sesion
								</button>
							</h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="card-body">
								<p>
									Dar clic en el boton "Iniciar sesion" y digitar esta cuenta: <br>
									Email: admin@gmail.com <br>Password: Admin123
								</p>
								<video controls>
								   <source src="vid/admin/vid1.mp4" type="video/mp4">
								</video>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" id="headingThree">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									2. Clientes
								</button>
							</h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body">
								<p>Solo puedes editar y eliminar clientes, debe estar conciente que no puede borrar un cliente que tenga un pedido en proceso</p>
								<video controls>
								   <source src="vid/admin/vid2.mp4" type="video/mp4">
								</video>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="heading4">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#h4" aria-expanded="false" aria-controls="h4">
									3. Productos
								</button>
							</h5>
						</div>
						<div id="h4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
							<div class="card-body">
								<video controls>
								   <source src="vid/admin/vid3.mp4" type="video/mp4">
								</video>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="heading5">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#h5" aria-expanded="false" aria-controls="collapseThree">
									4. Cotizaciones 
								</button>
							</h5>
						</div>
						<div id="h5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
							<div class="card-body">
								<p></p>
								<video controls>
								   <source src="vid/admin/vid4.mp4" type="video/mp4">
								</video>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" id="heading6">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#h6" aria-expanded="false" aria-controls="collapseThree">
									5. Pedidos
								</button>
							</h5>
						</div>
						<div id="h6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
							<div class="card-body">
								<p>Crear pedido</p>
								<video controls>
								   <source src="vid/admin/vid5.mp4" type="video/mp4">
								</video>
								<p>Cancelar pedido</p>
								<video controls>
								   <source src="vid/admin/vid6.mp4" type="video/mp4">
								</video>
								<p>Para finalizar un pedido seleccione "Ver pedido" y después clic en "Finalizar pedido" en el área de Administración -> Pedidos</p>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="heading7">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#h7" aria-expanded="false" aria-controls="collapseThree">
									6. Reporte de ingresos
								</button>
							</h5>
						</div>
						<div id="h7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
							<div class="card-body">
								<p></p>
								<video controls>
								   <source src="vid/admin/vid7.mp4" type="video/mp4">
								</video>
							</div>
						</div>
					</div>
				</div>

			</div>
			
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
	    <script type="text/javascript">
    		$("#alto").change(function(e){
    			
    			var value = $(this).val();
    			$("#srcimg").css('height',value+'px');
    		});
	    </script>
	    <script>
	        function mostrarimagen(input) {
	          if (input.files && input.files[0]){
	            var reader = new FileReader();
	              reader.onload = function(e){
	                $('#srcimg').attr('src',e.target.result);
	              }
	              reader.readAsDataURL(input.files[0]);
	          };
	        }
	        $('#foto').change(function(){mostrarimagen(this);});
    	</script>
    
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
	    <script>
	      // Example starter JavaScript for disabling form submissions if there are invalid fields
	      (function() {
	        'use strict';

	        window.addEventListener('load', function() {
	          // Fetch all the forms we want to apply custom Bootstrap validation styles to
	          var forms = document.getElementsByClassName('needs-validation');

	          // Loop over them and prevent submission
	          var validation = Array.prototype.filter.call(forms, function(form) {
	            form.addEventListener('submit', function(event) {
	              if (form.checkValidity() === false) {
	                event.preventDefault();
	                event.stopPropagation();
	              }
	              form.classList.add('was-validated');
	            }, false);
	          });
	        }, false);
	      })();
	    </script>
	</body>
</html>
