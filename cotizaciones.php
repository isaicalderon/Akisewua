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
				<form class='needs-validation' novalidate method="post" action='php/addCotizacion.php'>

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
								if ($row['ID'] > 0) {
									while($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)){
										$cont++;
										$total = $row2['precio'] * $row2['cantidad'];
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
													<input id='cantidad".$cont."' type='number' class='form-control cantidad' name='numberX' value='".$row2['cantidad']."' style='width:30%'>
												</td>
												<td>
												<label id='result".$cont."' >$".$total." USD</label> 
												</td>
												<td>
												<button type='button' class='btn btn-sm btn-outline-secondary'> Cancelar</button>
												</td>
											</tr>
										";
									}
								}
							?>						
						</tbody>
					</table>
					<button class='btn btn-primary' type='submit'>Realizar pedido</button>
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
					$('.cantidad').change(function(ev){
						var id = ev.currentTarget.id;
						var cant = ev.currentTarget.value;
						id = id.substr(-1);
						var price = document.getElementById('price'+id).value;
						var res = cant * price;
						var tmp = $('#result'+id);
						tmp.html("$"+res+" USD")
						//console.log(tmp);
						//document.getElementById('res'+id).innerHtml = res+".00";

					});
				});
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
