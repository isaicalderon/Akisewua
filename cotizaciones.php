<?php 
	require 'php/isLogin.php';
	require 'php/conexion.php';

	
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		<style>
			.tablaAlum th, td {
				border: none;
			}
		</style>
	    
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>

		<main role="main">
			<div class="container" style="margin-top: 2%">
				<form class='needs-validation' novalidate method="post" action='php/addPedido.php'>

					<table class="table">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Producto</th>
								<th scope="col">Precio</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						
						<tbody>
							<?php  
								$query = mysqli_query($con, "SELECT * FROM carro WHERE ID_User = ".$_SESSION['id_user']);
								$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
								$query2 = mysqli_query($con, "SELECT c.*, p.ID, p.Descripcion, p.url_img, p.precio FROM carro c, productos p WHERE c.ID_Prod = p.ID AND c.ID_User = ".$_SESSION['id_user'])or die("error");
								$cont = 0;
								$subTotal = 0;
								if ($row['ID'] > 0) {
									while($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)){
										$cont++;
										$total = $row2['precio'] * $row2['cantidad'];
										$subTotal += $total;
										echo "
											<tr>
												<th scope='row' style='width: 1px;'>
													<img src='".$row2['url_img']."' class='' style='width:50px;height:50px;'>
												</th>
												<td>
													".$row2['Descripcion']."
												</td>
												<td id=''>
													$".$row2['precio'].".00
												</td>
												<td>
													<input id='price".$cont."' type='number' value='".$row2['precio']."' style='display:none'>
													<input id='cantidad".$cont."' type='number' class='form-control cantidad' name='number".$cont."' value='".$row2['cantidad']."' style='width:50%'>
												</td>
												<td>
													<input id='totalX".$cont."' type='hidden' value='".$total."' style='display:none'>
													<label id='result".$cont."' >$".$total." USD</label> 
												</td>
												<td>
													<input type='hidden' value='".$row2['ID']."' name='ID".$cont."' style='display:none'>
													<a role='button' href='php/deleteCar.php?id=".$row2['ID']."'  class='btn btn-sm btn-outline-secondary'> Cancelar</a>
												</td>
											</tr>
										";
									}
								}
							?>						
						</tbody>
					</table>

					<div class="row mb-3">
						<form action="php/addPedido.php" method="post">
							<div class='col-md-4'>
								<input id='subtt' name='subt' type="hidden" value='<?php echo $subTotal; ?>'>
								<input id='contador' name='cont' type="hidden" value='<?php echo $cont; ?>'>
								<input id='ttotal' name='tTotal' type="hidden" value='<?php echo $subTotal; ?>'>
							</div>
							<div class='col-md-8'>
								<div class='row mb-3'>
									<div class='col'>
										<h6>SUBTOTAL</h6>
									</div>
									<div class="col">
										<p style='text-align:right'> <b id='subtotal' >$<?php echo $subTotal; ?>.00 USD</b></p>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										<h6>ENVIO</h6>
									</div>
									<div class="col">
										<div style='text-align:right'>
											<div class="form-check" onclick='changeRadio(0, 0)'>
												<input class="form-check-input" type="radio" name="opciones" id="radio1" value="1" required checked>
												<label class="form-check-label" for="radio1">
													Recojer en tienda
												</label>
											</div>
											<div class="form-check" onclick='changeRadio(1, 4)'>
												<input class="form-check-input" type="radio" name="opciones" id="radio2" value="1" required>
												<label class="form-check-label" for="radio2">
													Envío Estándar 3 a 6 Días: <b>$4 USD</b>
												</label>
											</div>
											<div class="form-check" onclick='changeRadio(2, 11)'>
												<input class="form-check-input" type="radio" name="opciones" id="radio3" value="1" required>
												<label class="form-check-label" for="radio3">
													Envío Urgente 1 a 2 Días: <b>$11 USD</b>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										<h6>PAGO</h6>
									</div>
									<div class="col">
										<div style='text-align:right'>

											<div class="form-check" onclick=''>
												<input class="form-check-input" type="radio" name="pago" id="pago1" value="1" required checked>
												<label class="form-check-label" for="pago1">
													Deposito o transeferencia bancaria
												</label>
											</div>
											<div class="form-check" onclick=''>
												<input class="form-check-input" type="radio" name="pago" id="pago2" value="2" required>
												<label class="form-check-label" for="pago2">
													PayPal (Tarjeta de Credito/Debito)
												</label>
											</div>
											<div class="form-check" onclick=''>
												<input class="form-check-input" type="radio" name="pago" id="pago3" value="3" required>
												<label class="form-check-label" for="pago3">
													Pago en tienda (Cd. Obregon)
												</label>
											</div>
											
										</div>	
									</div>
								</div>
								<hr>
								<div class="row mb-3">
									<div class="col">
										<h6>TOTAL</h6>
									</div>
									<div class="col">
										<h6 style='text-align:right'><b id='tTotal'>$<?php echo $subTotal; ?>.00 USD</b></h6>
									</div>
								</div>
								<button class='btn btn-primary' type='submit' style='float:right'>Realizar pedido</button>								
							</div>
						</form>		
					</div>
					<div class="alert alert-warning" role="alert">

						<div class="panel1">
							<i class="fas fa-exclamation-circle"></i> 
						</div>
						<div class="panel2">
							<ul>
								<li>
									Al realizar su pedido, usted acepta nuestras <a href="#">Políticas de Privacidad</a> y <a href="#">Garantias</a>
								</li>
								<li>
									Tratándose de los pedidos realizados en el plazo máximo de 5 días posteriores 
									a la fecha de su elaboración, sin haber realizado un anticipo o el pago total, 
									serán automáticamente eliminados por el sistema.
								</li>
							</ul>
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
		<!-- <script src="js/jquery-3.4.1.min.js"></script> -->
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
				$(document).ready(function(){
					var subtotal = 0
					$('.cantidad').change(function(ev){
						subtotal = $("#subtt").val();
						var id = ev.currentTarget.id;
						var cant = ev.currentTarget.value;
						id = id.substr(-1);
						var price = $('#price'+id).val();
						var res = price * cant;
						$('#result'+id).html("$"+res+" USD");
						$('#totalX'+id).val(res);
						
						console.log("subtotal: "+subtotal);
						console.log("precio: "+price);
						console.log("cantidad: "+cant);

						var cont = $("#contador").val();
						//console.log("cont: "+cont);
						var suma = 0;
						for(var i = 0; i < cont; i++){
							suma += parseInt($("#totalX"+(i+1)).val());
						}
						console.log("suma: "+suma)
						$("#subtt").val(suma);
						$("#ttotal").val(suma);
						$("#subtotal").html("$"+suma+".00 USD");
					});
				});

				function changeRadio(value, price){
					var subt = parseInt($("#subtt").val());
					var tt = subt + price;
					$("#tTotal").html("$"+tt+".00 USD");
					$("#ttotal").val(tt);
					// switch(value){
					// 	case 0:
					// 		subt
					// 		break;
					// 	case 1:
						
					// 		break;
					// 	case 2:
						
					// 		break;
					// }
				}
			</script>

	    <script type="text/javascript">
	    	$('#myModal').on('shown.bs.modal', function () {
			  $('#myInput').trigger('focus')
			})
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
