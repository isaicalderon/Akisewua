<?php 
	require 'php/conexion.php';
	require 'php/isLogin.php';
	require 'php/fecha.php';
	$redirect = "perfil.php";
	$root = false;
	if($_SESSION['root'] == 1){
		$root = true;
		$redirect = 'admin.php?pedidos=1';
	}

	if (@$_GET['id'] != "" || @$_POST['id'] != "") {
		if (@$_GET['id'] != ""){
			$id_pedido = @$_GET['id'];
		}
		if (@$_POST['id'] != ""){
			$id_pedido = @$_POST['id'];
		}
		$query = mysqli_query($con, "SELECT * FROM pedidos WHERE ID = ".$id_pedido);
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

		$fecha = castDate($row['fecha']);
		$estado = "";
		$envio = "";
		$pago = "";

		if($row['status'] == 0){
			$estado = "En espera";
		}
		if($row['status'] == 1){
			$estado = "Completado";
		}
		if($row['status'] == 2){
			$estado = "Cancelado";
		}

		if($row['envio'] == 1){
			$envio = "Recojer en tienda";
		}
		if($row['envio'] == 2){
			$envio = "Envío Estándar 3 a 6 Días: <b>$4 USD</b>";
		}
		if($row['envio'] == 3){
			$envio = "Envío Urgente 1 a 2 Días: <b>$11 USD</b>";
		}

		if($row['pago'] == 1){
			$pago = "Deposito o transeferencia bancaria";
		}
		if($row['pago'] == 2){
			$pago = "PayPal (Tarjeta de Credito/Debito)";
		}
		if($row['pago'] == 3){
			$pago = "Pago en tienda (Cd. Obregon)";
		}


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
		<style>
			mark {
					background-color: #f9f2f4;
					border-radius: 4px;
					color: #c7254e;
					font-size: 90%;
					padding: 2px 4px;
			}
			.tablaAlum th, td {
				border: none;
				text-align: left;
				padding: 8px;
			}
		</style>
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>

		<main role="main">
			<div class="container" style="margin-top: 2%">
				<h3 class='mb-3'>Pedido #<?php echo $id_pedido; ?> </h3>
				<p class='mb-4' style='font-size:16px;'>
					El pedido #<mark><?php echo $id_pedido; ?></mark> 
					se realizó el <mark><?php echo $fecha; ?></mark> y se encuentra como <mark><?php echo $estado; ?></mark>.
				</p>
				<h3 class='mb-3'>Detalles del pedido</h3>
				<table class="table">
					<thead>
						<tr>
							<th scope="col" style='width:70%'>Producto</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>

						<?php
							$cont = $row['cantidad_total'];
							$arrayId = explode(",", $row['id_prod']);
							$arrayCantidad = explode(",", $row['cantidad']);
							$arraySubtotal = explode(",", $row['subtotal']);
							$subtotal = 0; 
							$tTotal = $row['total'];
							for($i = 0; $i < $cont; $i++) {
								//echo $value;
								$res = mysqli_query($con, "SELECT * FROM `productos` WHERE ID = ".$arrayId[$i]);
								$subtotal += $arraySubtotal[$i];
								while($row2 = mysqli_fetch_array($res, MYSQLI_ASSOC)){
									echo "
										<tr>
											<td> 	<img src='".$row2['url_img']."' class='' style='width:50px;height:50px;'> ".$row2['Descripcion']." <span>×  ".$arrayCantidad[$i]."</span></td>
											<td><b>$".substr($arraySubtotal[$i],0,4)." USD</b></td>
										</tr>
									";
								}
							}
						?> 
					</tbody>
					<tfoot>
						<tr>
							<th scope="col">Subtotal</th>
							<td> <b>$<?php echo substr($subtotal,0,4);?> USD</b></td>
						</tr>
						<tr>
							<th scope="col">Envio</th>
							<td> <?php echo $envio;?></td>
						</tr>
						<tr>
							<th scope="col">Pago</th>
							<td> <?php echo $pago;?></td>

						</tr>
						<tr>
							<th scope="col">Total</th>
							<td> <b>$<?php echo $tTotal;?> USD</b></td>
						</tr>
					</tfoot>
				</table>
				<?php if($row['pago'] == 1){ ?>
				<div class="alert alert-info" role="alert">
					Realice su pago por medio de depósito bancario o transeferencia interbancaria en cualquiera de los 
					siguentes bancos.
				</div>
				<div class="alert alert-warning" role="alert">
					Por favor envié su comprobante de pago a ventas@akisewua.com, su pedido será enviado el mismo día si confirma antes de 12 PM.
				</div>
				<div class="alert alert-light" role="alert">
						<h4 class='mb-3 mt-2 text-center'>Datos bancarios</h4>
						<h5>Bancomer:</h5>
						<p>Banco: <b>Maria Guadalupe</b>  <br>
						Numero de cuenta: <b>6547893210</b> <br>
						CLABE: <b>00132465789654321</b> </p>
						
						<h5>Banamex:</h5>
						<p>Banco: <b>Maria Guadalupe</b>  <br>
						Numero de cuenta: <b>4569871266</b> <br>
						CLABE: <b>00132415587763321</b> </p>
				</div>
				<?php } ?>
				<a class="btn btn-warning" href="<?php echo $redirect;?>">Regresar</a>

				<?php
				
					if($root){
							echo "
								<a class='btn btn-success' href='php/aceptarPedido.php?id=".$id_pedido."&id_user=".$row['id_cliente']."'>Aceptar pedido</a>
							";
					}	

				?>

			</div>
			
			<!-- FOOTER <a class="btn btn-primary" href="javascript:history.back()">Regresar</a>
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
