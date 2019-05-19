<?php 
	require 'php/conexion.php';
	require 'php/isLogin.php';

	if (@$_GET['id'] != "") {
		$id_pedido = @$_GET['id'];
		$query = mysqli_query($con, "SELECT pp.ID,coti.ID_Prod,c.Nombres, c.Apellidos, pp.Descripcion, pp.Monto_inicial, pp.Monto_total,pp.Fecha_inicio, pp.Fecha_final, pp.Concepto_venta FROM pedidos_proceso pp, cotizaciones coti, clientes c, productos p WHERE pp.ID_Coti = coti.ID AND coti.ID_Prod = p.ID AND coti.ID_User = c.ID AND pp.ID = ".$id_pedido);
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	}else{
		header("Location: admin.php");
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
	    
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>

		<main role="main">
			<div class="container" style="margin-top: 2%">
				<form>
					<div class="row">
						<div class="col-md-4">
							<div class="card">
								<?php 
								echo "
									<img src='php/getImg.php?ID=".$row['ID_Prod']."' style='width: 100%;height: 300px'>
								";
								 ?>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-10 ">
									<h4>Pedido por: <?php echo $row['Nombres']." ".$row['Apellidos']; ?></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 mb-3">
									<label><b>Descripción:</b> <?php echo $row['Descripcion']; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 mb-3">
									<label><b>Conceto venta:</b> <?php echo $row['Concepto_venta']; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 mb-3">
									<label><b>Monto incial:</b> $<?php echo $row['Monto_inicial']; ?> USD</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 mb-3">
									<label><b>Costo total:</b> $<?php echo $row['Monto_total']; ?> USD</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 mb-3">
									<label><b>Fecha inciado:</b> <?php echo $row['Fecha_inicio']; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 mb-3">
									<label><b>Fecha entrega:</b> <?php echo $row['Fecha_final']; ?></label>
								</div>
							</div>
							<div class="row">
								<?php 
									if ($_SESSION['root'] == 1) {
								?>
								<div class="col-md-10 mb-3">
									<a class="btn btn-primary" href="admin.php?pedidos=1">Regresar</a>
									<a class="btn btn-primary" <?php echo "href='php/finalizarPedido.php?id=".$id_pedido."'"; ?>>Finalizar pedido</a>
								</div>
								
								<?php }else{ ?>
								<div class="col-md-10 mb-3">
									<a class="btn btn-primary" href="javascript:history.back()">Regresar</a>
								</div>
								<?php } ?>
							</div>
							
							
						</div>
					</div>
				
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
