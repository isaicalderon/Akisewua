<?php 
	require 'php/isLogin.php';
	require 'php/conexion.php';

	$id = @$_POST["id_user"];
	if ($id > 0) {
		$edit = true;
		$query = mysqli_query($con, "SELECT * FROM clientes WHERE ID = ".$id)or die(mysqli_error($con));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

	}else{
		$edit = false;
	}
	if (@$_GET['ID'] != "") {
		if ($_SESSION['root'] == 1) {
			$edit = true;
			$id = @$_GET['ID'];
			$query = mysqli_query($con, "SELECT * FROM clientes WHERE ID = ".$id)or die(mysqli_error($con));
			$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

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
		<link href="css/form-validation.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
    	<style type="text/css">
    		.error{
    			color: red;
    		}
    		.noerror{
    			color: green;
    		}
    		.alert{
    			color: orange;
    		}
    	</style>
		<script src="js/modernizr.custom.js"></script>
	    
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>

		<main role="main">
			<div class="container" style="margin-top: 2%">
				<div class="col-md-12 order-md-1">
					<h4 class="mb-3">Ingrese sus datos</h4>
							<?php 
								if ($edit) {
									echo "
										<form class='needs-validation mb-3' novalidate method='post' action='php/editUser.php' >
											<input style='display:none' value='".$id."' name='id_user'>
									";
								}else{
									echo "
										<form class='needs-validation mb-3' novalidate method='post' action='php/registrarUsuario.php' >
									";
								}
							?>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="firstName">Nombre<span class="text-muted">(s)</span></label>
								<input name ="firstName" type="text" class="form-control" id="firstName"
								<?php if($edit){echo "value='".$row['Nombres']."' ";}else{} ?> required>
								<div class="invalid-feedback">
									Este campo es requerido.
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="lastName">Apellido<span class="text-muted">(s)</span></label>
								<input type="text" class="form-control" id="lastName" name="lastName"
								<?php if($edit){echo "value='".$row['Apellidos']."'";}else{} ?> required>
								<div class="invalid-feedback">
								Este campo es requerido.
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="email">Correo electrónico</label>
							<input id='id_email' name="email" type="email" class="form-control" id="email" placeholder="email@example.com" required <?php if($edit){echo "disabled value='".$row['Email']."'";} ?>>
							<div id='statusEmail' class="invalid-feedback" >
								Ingrese una cuenta de email.
							</div>
						</div>

						<div class="mb-3">
							<label for="pass1">Contraseña</label>
							<input name="pass1" type="password" class="form-control" id="pass1" required autofocus="autofocus" min="6" max="10">
							<div class="invalid-feedback">
								Ingrese una contraseña
							</div>
						</div>
						
						<div class="mb-3">
							<label for="pass2">Contraseña <span class="text-muted">(Confirmar)</span></label>
							<input name="pass2" type="password" class="form-control" id="pass2" required autofocus="autofocus" min="6" max="10">
							<div class="invalid-feedback">
								Ingrese una contraseña
							</div>
						</div>
						
						<div class="mb-3">
							<label for="address">Dirección</label>
							<input name="dir1" type="text" class="form-control" id="address" placeholder="1234 Main St" required <?php if($edit){echo "value='".$row['Direccion']."' ";} ?>>
							<div class="invalid-feedback">
								Porfavor ingrese una dirección real de su domicilio
							</div>
						</div>

						<div class="mb-3">
							<label for="address2">Teléfonos</label>
							<input name="tel" type="text" class="form-control" id="address2" placeholder="(644) 000 0000"
							required <?php if($edit){echo "value='".$row['Telefonos']."'";}?> >
						</div>

						<div class="row">
							<div class="col-md-5 mb-3">
								<label for="country">País</label>
								<select name="pais" class="custom-select d-block w-100" id="country" required>
									<option>Mexíco</option>
									<option>United States</option>
									<option>España</option>
								</select>
								<div class="invalid-feedback">
									Please select a valid country.
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="state">Estado</label>
								<select name="estado" class="custom-select d-block w-100" id="state" required>
									<option>Sonora</option>
									<option>Sinaloa</option>
									
								</select>
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label for="zip">Zip</label>
								<input name="zip" type="text" class="form-control" id="zip" placeholder="" required
								<?php if($edit){echo "value='".$row['Zip']."'";} ?>>
								<div class="invalid-feedback">
								Zip code required.
								</div>
							</div>
						</div>
						
						<hr class="mb-4">
						<a class="btn btn-warning" href="javascript:history.back()">Regresar</a>
						<button id='boton' class="btn btn-primary" type="submit"><?php if($edit){echo "Aceptar";}else{ echo "Registrarse";} ?></button>
						
					</form>
					<div class="alert alert-warning" role="alert">
					<i class="fas fa-exclamation-circle"></i>  Dando clic en registrarse usted acepta nuestros Términos y Condiciones.
					</div>
				</div>

			</div>
			
			<!-- FOOTER -->
			<footer class="container">
				<p class="float-right"><a href="#">Arriba</a></p>
				<p>&copy; Aki sewua, Inc. Developers 2018 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos y condiciones</a>
					&middot; <a href="mapa.php">Mapa</a></p>
			</footer>
		</main>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster 
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		-->
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/vendor/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
		<script src="js/vendor/holder.min.js"></script>
		<!-- -->
		<script src="js/grayscale.min.js"></script>
	    <script src="js/classie.js"></script>
	    <script src="js/dialogFx.js"></script>

			<script>
				$(document).ready(function(){
					$("#id_email").change(function(event){
						//console.log(this.value)						
						var params = {
							email: this.value
						}
						$.get('php/rest/getEmail.php', params, function(response){
							if(response == 200){
								//console.log(tthis);
								$("#id_email").removeClass('novalid-input');	
								$("#id_email").addClass('valid-input');
								$("#statusEmail").css("display", "none");
							}else{
								$("#id_email").removeClass('valid-input');	
								$("#id_email").addClass('novalid-input');						
								$("#statusEmail").css("display", "block");
								$("#statusEmail").html('El correo escrito ya esta en uso');								
							}
						});
						
					});
				});
			</script>

	    <script type="text/javascript">
			$(document).ready(function() {
				//variables
				var pass1 = $('[name=pass1]');
				var pass2 = $('[name=pass2]');
				var confirmacion = "Las contraseñas coinciden";
				var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
				var negacion = "No coinciden las contraseñas";
				var vacio = "La contraseña no puede estar vacía";
				//oculto por defecto el elemento span
				var span = $("<span></span>").insertAfter(pass2);
				span.hide();
				//función que comprueba las dos contraseñas
				function coincidePassword(){
					var valor1 = pass1.val();
					var valor2 = pass2.val();
					//muestro el span
					span.show().removeClass();
					//condiciones dentro de la función
					if(valor1 != valor2){
						span.text(negacion).addClass("error");
						$("#boton").attr("disabled","");
					}

					if(valor1.length > 0 && valor1 == valor2){
						span.text(confirmacion).removeClass("error").addClass('noerror');
							$("#boton").removeAttr("disabled","");			
					}
				}
				//ejecuto la función al soltar la tecla
				pass2.keyup(function(){
					coincidePassword();
				});
				$("#firstName").focus();
			});
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
