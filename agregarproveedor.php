<?php 
	require 'php/isLogin.php';
    require 'php/conexion.php';
    
    $form = 'php/addProveedor.php';
    $btn = 'Aceptar';
    $array = array();
    
    for ($i = 0; $i < 7 ; $i++) { 
        $array[$i] = "";
    }

	if (($id = @$_GET["id"]) != "") {
        $edit = true;
        //$form = 'php/editarProveedor.php';
        $btn = 'Editar'; 

        $result = mysqli_query($con, "SELECT * FROM proveedores WHERE ID = ".$id);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        $array[0] = $row[0];
        $array[1] = $row[1];
        $array[2] = $row[2];
        $array[3] = $row[3];
        $array[4] = $row[4];
        $array[5] = $row[5];
        $array[6] = $row[6];
        $array[7] = "1";
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
                <form class='needs-validation' action='<?php echo $form;?>' method='post' novalidate>
                    <input type="text" style='display:none;' value='<?php echo $array[0]; ?>' name='id'>
                    <input type="text" style='display:none;' value='<?php echo $array[7]; ?>' name='status'>
                    <div class="form-group">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre completo" name='nombres' 
                            value='<?php echo $array[1]; ?>' required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Direccion" name='direccion' 
                            value='<?php echo $array[2]; ?>' required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" placeholder="Telefono" name='telefono' 
                            value='<?php echo $array[3]; ?>' required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" id="empresa" placeholder="Empresa" name='empresa' 
                            value='<?php echo $array[4]; ?>' required>
                        <div class="invalid-feedback">
                           Este campo es requerido
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electronico</label>
                        <input type="email" class="form-control" id="correo" placeholder="email@example.com" name='email' 
                            value='<?php echo $array[5]; ?>' required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cp">Codigo Postal</label>
                        <input type="text" class="form-control" id="cp" placeholder="CP" name='cp' 
                            value='<?php echo $array[6]; ?>' required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
                    <a class='btn btn-secondary' href='admin.php?prov=1'>Regresar</a>
                    <button class='btn btn-primary' type='submit'> <?php echo $btn; ?> </button>
                </form>
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
