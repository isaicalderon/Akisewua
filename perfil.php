<?php 
	require 'php/conexion.php';
	require 'php/isLogin.php';
	require 'php/desencriptar.php';
	if ($status) {
		if (@$_GET['id'] == "") {
			if($_SESSION['root'] == 1 ){
				header("Location: admin.php");
			}
		}
	}else{
		header("Location: index.php");
	}
	
	if (@$_GET['id'] != "") {
		$id = @$_GET['id'];
	}else{
		$id = $_SESSION['id_user'];
	}

	$query = mysqli_query($con, "SELECT * FROM clientes WHERE ID = ".$id);
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
    	<link href="css/form-validation.css" rel="stylesheet">
    	
		<script src="js/modernizr.custom.js"></script>
	    
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>

		<main role="main">
			<div class="container" style="margin-top: 2%">
				<div class="col-md-10 order-md-1">
					<!--
					<h4 class="mb-3"><?php echo $row['Nombres']." ".$row['Apellidos']; ?></h4>
					-->
					<form id='form' class="needs-validation" novalidate method="post" action="registrarse.php" >
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="firstName">Nombre<span class="text-muted">(s)</span></label>
								<input name ="firstName" type="text" class="form-control" id="firstName"
								<?php echo "value='".$row['Nombres']."' "; ?> required disabled>
								<div class="invalid-feedback">
									Este campo es requerido.
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="lastName">Apellido<span class="text-muted">(s)</span></label>
								<input type="text" class="form-control" id="lastName" name="lastName"
								<?php echo "value='".$row['Apellidos']."' "; ?>  required disabled>
								<div class="invalid-feedback">
								Este campo es requerido.
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="email">Correo electronico</label>
							<input name="email" type="email" class="form-control" disabled id="email" placeholder="email@example.com" <?php echo "value='".$row['Email']."'";?> >
							<div class="invalid-feedback">
								Ingrese una cuenta de email
							</div>
						</div>

						<div class="mb-3">
							<label for="pass">Contraseña</label>
							<input name="pass" type="password" class="form-control" id="pass" required
							<?php echo "value='".desencriptar($row['Password'])."'"; ?> disabled>
							<div class="invalid-feedback">
								Ingrese una contraseña
							</div>
						</div>
						
						<div class="mb-3">
							<label for="address">Direccion</label>
							<input name="dir1" type="text" class="form-control" id="address" placeholder="1234 Main St" required <?php echo "value='".$row['Direccion']."' "; ?> disabled>
							<div class="invalid-feedback">
								Please enter your shipping address.
							</div>
						</div>

						<div class="mb-3">
							<label for="address2">Telefonos</label>
							<input name="tel" type="text" class="form-control" id="address2" placeholder="(644) 000 0000"
							required <?php echo "value='".$row['Telefonos']."'";?> disabled>
						</div>

						<div class="row">
							<div class="col-md-5 mb-3">
								<label for="country">Pais</label>
								<input name="pais" type="text" class="form-control" id="address2" placeholder="" required <?php echo "value='".utf8_encode($row['Pais'])."'";?> disabled>
								<div class="invalid-feedback">
									Please select a valid country.
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="country">Pais</label>
								<input name="pais" type="text" class="form-control" id="address2" placeholder="" required <?php echo "value='".$row['Estado']."'";?> disabled>
								<div class="invalid-feedback">
									Please select a valid country.
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label for="zip">Zip</label>
								<input name="zip" type="text" class="form-control" id="zip" placeholder="" required
								<?php echo "value='".$row['Zip']."'"; ?> disabled>
								<div class="invalid-feedback">
								Zip code required.
								</div>
							</div>
						</div>
						<?php 
							echo "
								<input style='display:none;' value='".$row['ID']."' name='id_user'>
							";
						 	if ($row['ID'] == $_SESSION['id_user']) {
						 	
						 ?>
						<label class="btn btn-secondary" role="button" onclick="document.forms['form'].submit();">Editar mis datos</label>
						<?php
						 echo "
					 	<label class='btn btn-danger' data-toggle='modal' data-target='#mod".$row['ID']."'>Eliminar mi cuenta</label>
        				<!-- Modal -->
						<div class='modal fade' id='mod".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
						    <div class='modal-dialog' role='document'>
						        <div class='modal-content'>
						            <div class='modal-header'>
						                <h5 class='modal-title' id='modalLabel'>Mensaje</h5>
						                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						                <span aria-hidden='true'>&times;</span>
						                </button>
						            </div>
						            <div class='modal-body'>
						                Seguro deseas eliminar tu cuenta?
						                Se borrara toda tu informacion personal
						            </div>
						            <div class='modal-footer'>
						                <button type='button' class='btn btn-primary' onclick=\"window.location.href='php/deleteCliente.php?id=".$row['ID']."';\">Continuar</button>
						                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
						            </div>
						        </div>
						    </div>
						</div>
						 ";
						 }
						 ?>
						<a id="cotizacion"></a>
		            
						<hr class="mb-4">
						<!--
						<button class="btn btn-primary" type="submit">Modificar</button>
						-->
						<br><br>
					</form>
				</div>
				<div class="row">
		          <div class="col-md-12">
		          	<h4>Pedidos</h4>
		            <table class="tablaAlum">
		                <thead>
		                    <tr>
								<th></th>
								<th>Producto</th>
								<th>Nombre cliente</th>
								<th>Cantidad</th>
								<th>Total</th>
								<th>Fecha pedido</th>
								<th>Fecha entrega</th>
								<th>Opciones</th>
								
	                        </tr>

		                </thead>
		                <tbody>
							<?php
								$query = mysqli_query($con, 
									"SELECT ped.ID, p.Descripcion, p.url_img, c.Nombres, c.Apellidos, ped.cantidad, ped.total, ped.Fecha, ped.fecha_entrega FROM productos p, clientes c, pedidos ped WHERE ped.ID_Prod = p.ID AND c.ID = ped.ID_Cliente");
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
									echo "
										<tr>
											<td style='width: 1px;'><img src='".$row['url_img']."' class='' style='width:50px;height:50px;'></td>
											<td>".$row['Descripcion']."</td>
											<td>".$row['Nombres']." ".$row['Apellidos']."</td>
											<td>".$row['cantidad']."</td>
											<td>".$row['total']."</td>
											<td>".$row['Fecha']."</td>
											<td>".$row['fecha_entrega']."</td>
											<td>
												<button class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalProv".$row['ID']."'>Eliminar</button>
														
												<!-- Modal -->
												<div class='modal fade' id='modalProv".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
													<div class='modal-dialog' role='document'>
														<div class='modal-content'>
															<div class='modal-header'>
																<h5 class='modal-title' id='modalLabel'>Mensaje</h5>
																<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																<span aria-hidden='true'>&times;</span>
																</button>
															</div>
															<div class='modal-body'>
																Seguro deseas cancelar esta cotización?
															</div>
															<div class='modal-footer'>
																<button type='button' class='btn btn-primary' onclick=\"window.location.href='php/cancelarPedido.php?id=".$row['ID']."';\">Continuar</button>
																<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
									" ;
									
								}
								
							?>
		                </tbody>
		            </table>
	            		<!--
	            		<form id="form1" action="" method="post">
		                    <p>
		                    <button class="btn btn-primary" role="button" id="cancelarP">Eliminar</button>
		                   	<input class="form-control login-field" style="width:10%;display:inline;"
		                           placeholder="ID" required id="ID_PP" name="id"/>
		                    </p>
		                </form>
						-->
		          </div>
		        </div>
		        <hr class="mb-4">
		        <a name="vt"></a>

		        <hr class="mb-4">				
		        

			</div>
			<br><br>
			<!-- FOOTER -->
			<footer class="container">
				<p class="float-right"><a href="#">Arriba</a></p>
				<p>&copy; Aki sewua, Inc. Developers 2018 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos y condiciones</a>
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
	    <script type="text/javascript">
	    	$(document).ready(function(e){
	    		$("#btnEdit").click(function(event){
	    			$("input").removeAttr("disabled","");
	    		});
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
