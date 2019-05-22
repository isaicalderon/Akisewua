<?php 
	require 'php/isLogin.php';
	require 'php/conexion.php';
	$stock = 0;
	$precio = "";
	if (($id = @$_GET["id"]) != "") {
		$edit = true;
		$value = @$_GET["val"];
		$alto = @$_GET["alto"];
		$url_img = @$_GET["img"];
		$stock = @$_GET["stock"];
		$precio = @$_GET["price"];
		
	}else{
		$id = 0;
		$edit = false;
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
				<div class="row">
					<div class='col-md-4'>
		                <div class='card mb-4 box-shadow'>
		                	<?php if(!$edit){ ?>
		                    	<img id='srcimg' class='card-img-top' src='img/productos/no-image.jpeg' data-holder-rendered='true' style='height:225px; width: 100%; display: block;'>
							<?php 
								}else{ 
		                    	echo "
		                    	<img id='srcimg' class='card-img-top' src='".$url_img."' data-holder-rendered='true' style='height:".$alto."px; width: 100%; display: block;'>
		                     		";
		                     	} 
		                     ?>
		                </div>
		            </div>
					<div class="col-md-8">
						<?php if(!$edit){ ?>
							<h4 class="mb-3">Añadir un producto</h4>
						<?php }else{ ?>
							<h4 class="mb-3">Editar un producto</h4>
						<?php } ?>
						<form class="needs-validation" novalidate method="post" action="php/addProducto.php" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="desc">Descripcion del producto</label>
									<?php if(!$edit){ ?>
										<textarea name ="desc" type="text" class="form-control" required=""></textarea>
									<?php }else{ ?>
										<textarea name ="desc" type="text" class="form-control" required=""><?php echo $value; ?></textarea>
									<?php } ?>
									<div class="invalid-feedback">
										Este campo es requerido.
									</div>

								</div>
							</div>
							<div class="mb-3">
								<label for="foto">Abra una imagen (El nombre de las imagenes no deben repetirse) </label>
								<input name="img" type="file" class="form-control" id="foto" required="" alt='No image' title='Imagen actual'>
								<div class="invalid-feedback">
									Este campo es requerido.
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 mb-3">
										<label for="price">Costo (USD)</label>
										<input id='price' type="text" class='form-control' name='precio' 
											value='<?php echo $precio; ?>' placeholder='$ USD' required>
								</div>
								<div class="col-md-4 mb-3">
										<label for="stock">Stock</label>
										<input id='stock' type="number" class='form-control' name='stock' 
											value='<?php echo $stock;?>' placeholder='Stock' required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="alto">Proveedor</label>
									<select name="proveedor" class="custom-select d-block w-100" id="prov" required="">
										<?php 
											$res = mysqli_query($con, "SELECT * FROM proveedores");
											while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
												echo "
													<option value='".$row['ID']."'>".$row['ID']." - ".$row['Nombre']."</option>
												";
											}
										?>
										
									</select>
									<div class="invalid-feedback">
										Este campo es requerido.
									</div>
								</div>
								<div class="col-md-4 mb-3">
									<label for="alto">Height</label>
									<select name="alto" class="custom-select d-block w-100" id="alto" required="">
										<option value='225'>225 px</option>
										<option value='400'>400 px</option>
									</select>
									<div class="invalid-feedback">
										Este campo es requerido.
									</div>
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="alto">Categoria</label>
									<select name="categorias" class="custom-select d-block w-100" id="alto" required="">
										<option value='1'>Vestidos</option>
										<option value='2'>Blusas</option>
										<option value='3'>Rebosos</option>
										<option value='4'>Artesanias</option>
										<option value='5'>Mascaras</option>
									</select>
									<div class="invalid-feedback">
										Este campo es requerido.
									</div>
								</div>
								
								
							</div>
							<input type="texto" name="status" <?php echo "value='".$edit."' "; ?> style="display: none">
							<input type="texto" name="id" <?php echo "value='".$id."' "; ?> style="display: none">			
							<hr class="mb-4">
							<a class="btn btn-secondary" onclick="window.location.href='admin.php?prod=1'" style='color:white'>Regresar</a>
								
							<?php if(!$edit){ ?>
								<button class="btn btn-primary" type="submit">Aceptar</button>
							<?php }else{ ?>
								<button class="btn btn-primary" type="submit">Hacer cambios</button>
								
							<?php } ?>
							<br><br>
						</form>
					</div>

				</div>
				
			</div>
			
			<!-- FOOTER
			<footer class="container">
				<p class="float-right"><a href="#">Arriba</a></p>
				<p>&copy; Aki sewua, Inc. Developers 2018 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos y condiciones</a>
					&middot; <a href="#">Mapa</a></p>
			</footer>
			 -->
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
