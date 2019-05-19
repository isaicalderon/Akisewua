<?php 
	require 'php/isLogin.php';
	require 'php/conexion.php';

	if (($id = @$_GET["id"]) != "") {
		$edit = true;
		$iduser = @$_GET["nusr"];
		$q = "SELECT c.ID, m.De, a.Names, c.Nombres, c.Apellidos, m.Mensaje, m.Fecha FROM mensajes_coti m, cotizaciones coti, clientes c, admin a WHERE m.ID_Coti = coti.ID AND c.ID = coti.ID_User AND m.ID_Coti = ".$id;
		$query = mysqli_query($con, $q) or die(mysqli_error($con));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	}else{
		$id = 0;
		$edit = false;
		if ($row['ID'] != $_SESSION['id_user']) {
			if ($_SESSION['root'] != 1) {
				header("Location: perfil.php");
			}
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
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
				
		<script src="js/modernizr.custom.js"></script>
	    
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>

		<main role="main">
			<div id="wrapper">
				<div id="page-content-wrapper">
					<div class="container-fluid" style="margin-top: 2%">
						<div class="row">
							<div class="col-md-10">
								<h4>Cliente: <?php echo $row['Nombres']." ".$row['Apellidos']; ?></h4>
								<table class="tablaAlum">
					                <thead>
					                    <tr>
					                        <th>Remitente</th>
					                    	<th>Mensaje</th>
					                    	<th>Fecha</th>
					                    </tr>
									</thead>
					                <tbody>
					                    <?php
					                    	
				                            $query2 = mysqli_query($con,"SELECT m.ID, m.De, c.Nombres, m.Mensaje, m.Fecha, m.Name_img FROM mensajes_coti m, clientes c WHERE c.ID = '".$row['ID']."' AND m.ID_Coti = ".$id)or die(mysqli_error($con));

				                            while($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)){
			                        			if ($row2['De'] > 1000) {
			                        				$idtmp = $row2['De'] - 1000;
		                        					$query3 = mysqli_query($con, "SELECT * FROM admin WHERE ID = ".$idtmp) or die(mysqli_error($con));
		                        					$row3 = mysqli_fetch_array($query3, MYSQLI_ASSOC);
		                        					echo "
					                                <tr>
				                                    	<td>".$row3['Names']." </td>
			                                    	";
			                                    	if ($row2['Name_img']!=null) {
		                                    		echo "
		                                    			<td>".$row2['Mensaje']." <a href='php/getImgCot.php?id=".$row2['ID']." ' download='".$row2['Name_img']."'>".$row2['Name_img']."</a></td>
		                                    			<td>".$row2['Fecha']."</td>
				                                    	
		                                    		";
			                                    	}else{
		                                    		echo "
					                                    <td>".$row2['Mensaje']." </td>
				                                    	<td>".$row2['Fecha']."</td>
				                                    </tr>
					                            	" ;
					                            	
			                                    	}

					                            }else{
			                        				echo "
					                                <tr>
				                                    	<td>".$row2['Nombres']." </td>
			                                    	";
			                                    	if ($row2['Name_img']!=null) {
		                                    		echo "
		                                    			<td>".$row2['Mensaje']." <a href='php/getImgCot.php?id=".$row2['ID']." ' download='".$row2['Name_img']."'>".$row2['Name_img']."</a></td>
		                                    			<td>".$row2['Fecha']."</td>
				                                    	
		                                    		";
			                                    	}else{
		                                    		echo "
					                                    <td>".$row2['Mensaje']." </td>
				                                    	<td>".$row2['Fecha']."</td>

				                                    </tr>
					                            	" ;
					                            	
			                                    	}
					                            }

					                        }
					                      	 
					                    ?>
					                </tbody>
					            </table>
			            	</div>

			            	<hr>
			            	<div class="col-md-12">
			            		<form action="php/enviarMensaje.php" method="post" enctype="multipart/form-data">
				                    
			                    	<input style="display: none;" name="id_de" <?php echo "value='".$row['De']."'"; ?>/>
			                    	<input style="display: none;" name="id_coti" <?php echo "value='".$id."' "; ?> />
			                    	<input style="display: none;" name="id_user" <?php echo "value='".$row['ID']."' "; ?> />
			                    	<input style="display: none;" name="idusertmp" <?php echo "value='".$row['ID']."' "; ?> />
			                    	<div class="row">
			                    		<div class="col-md-4" style="padding-right: 0;">
			                    			<textarea class="form-control" name='mensaje' placeholder="Mensaje"></textarea>
			                    		</div>
			                    		<div class="col-md-4" style="padding: 0;">
			                    			<input type="file" name="img" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" accept="image/*" onchange="validateFileType()" />
											<label for="file-3" style="padding: 9px 9px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Adjuntar imagen</span></label>
			                    		</div>
			                    	</div>

		                    		<br>
			                    	
				                    <button class="btn btn-primary" role="button" type="submit">Enviar</button>

			                    	
				                    <?php 
					                    if ($_SESSION['root'] == 1) {
					                    	if (@$_GET['ped'] != "") {
					                    		echo "
					                    			<a class='btn btn-primary' role='button' href='admin.php?pedidos=1'>Regresar</a>
			                    				";
											}else {
												echo "
				                    			<a class='btn btn-primary' role='button' href='admin.php?coti=1'>Regresar</a>
			                    				<a onclick=\"window.location.href = 'realizarpedido.php?id_usr=".$row['ID']."&id_coti=".$id."';\" class='btn btn-primary' role='button' style='color:white;'>Realizar Pedido</a>
					                    		";
											}
				                    	}else{
				                    		echo "<a class='btn btn-primary' role='button' href='perfil.php#cotizacion'>Regresar</a>
			                    			";
				                    	}	
				                     ?>
				                    
				                </form>
			            	</div>
						</div>
						<hr>
						<?php 
							$query = mysqli_query($con, "SELECT * FROM cotizaciones WHERE ID = ".$id) or die("Error");
						 	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
						 ?>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
											
										<div class="col-md-10">
											<h4>Información de cotizacion</h4>
										</div>
										<div class="col-md-10">
											<label><b>Descripción: </b><?php echo $row['Descripcion']; ?></label>
										</div>
										<div class="col-md-10">
											<label><b>Fecha: </b><?php echo $row['Fecha']; ?></label>
										</div>
										
										<div class="col-md-5">
											<?php 
												echo "
					                    	<img id='srcimg' class='card-img-top' src='php/getImg.php?ID=".$row['ID_Prod']."' data-holder-rendered='true' style='height:400px; width: 100%; display: block;'>
					                     		";
											 ?>
										</div>
									</div>	
								</div>
								<div class="col-md-6">
									
								</div>
							</div>
							
						</div> 

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
		<script src="js/custom-file-input.js"></script>
		<script src="js/grayscale.min.js"></script>
	    <script src="js/classie.js"></script>
	    <script src="js/dialogFx.js"></script>
	    <script type="text/javascript">
    		 function validateFileType(){
		        var fileName = document.getElementById("file-3").value;
		        var idxDot = fileName.lastIndexOf(".") + 1;
		        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
		        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"|| extFile=="PDF"){
		            //TO DO
		        }else{
		            alert("Solo se permiten imagenes jpg, jpeg, png y PDF!");
		            $('#file-3').change(function(){mostrarimagen(null);});
		        }   
		    }
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
