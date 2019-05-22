<?php 
	require 'php/conexion.php';
	require 'php/isLogin.php';
	require 'php/fecha.php'; 

	if ($status) {
		if($_SESSION['root'] != 1 ){
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	} 
	@$va = @$_GET['va'];
	@$co = @$_GET['co'];
	@$ped = @$_GET['ped'];
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

		<!-- fontawesome core CSS -->
		<link href="fontawesome-free-5.0.13/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/admin.css" rel="stylesheet">
		<link href="css/carousel.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/dialog.css" rel="stylesheet">
	    <link href="css/dialog-sandra.css" rel="stylesheet">
	    <link href="css/ns-default.css" rel="stylesheet">
    	<link href="css/ns-style-growl.css" rel="stylesheet">
		<script src="js/modernizr.custom.js"></script>
		<style>
			.table th, td {
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

		<div id="wrapper">

	        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	                <li class="sidebar-brand"><a href="#">Menú principal</a></li>
	                <li><a href="#" id="1" class="menu">Clientes Nuevos</a></li>
	                <li><a href="#" id="5" class="menu">Productos</a></li>
	                <li><a href="#" id="6" class="menu">Proveedores</a></li>
	                <li><a href="#" id="3" class="menu">Pedidos</a></li>
	                <li><a href="#" id="8" class="menu">Productos populares</a></li>
	                <li><a href="#" id="10" class="menu">Reporte de ventas</a></li>
					<li><a href="#" id="7" class="menu">Contacto y ayuda</a></li>
	            </ul>
	        </div>
	        <!-- /#sidebar-wrapper -->

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid">
					<a href="#menu-toggle" class="btn btn-info" id="menu-toggle" style="position: fixed;z-index: 1000;"><i class="fa fa-list-ul" style="font-size:24px;"></i></a><label></label>
					<hr class="mb-4">
			        <!-- Clientes LISTO -->
	        		<div class="row abs" id="11">
						<div class="col-md-12">
							<h4>Clientes nuevos (top 5)</h4>
							<table class="table">
							    <thead>
							        <tr>
							            <th>Nombres</th>
							            <th>Email</th>
							            <th>Teléfonos</th>
							            <th>País</th>
										<th>Opciones</th>
							        </tr>
								</thead>
							    <tbody>
							        <?php
							        	$tmp = "";
							        	if (@$_GET["vc"] != 1) {$tmp = "LIMIT 5";}
							            $query = mysqli_query($con, "SELECT * FROM clientes ORDER BY ID DESC ".$tmp);
							      	 	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
							                echo "
							                    <tr>
							                        <td>".$row['Nombres']." ".$row['Apellidos']."</td>
													<td>".$row['Email']."</td>
							                        <td>".$row['Telefonos']."</td>
							                    	<td>".utf8_encode($row['Pais'])."</td>
							                    	<td>
							                        	<div class='btn-group'>
								                        	<button onclick=\"window.location.href = 'perfil.php?id=".$row['ID']."';\" class='btn btn-sm btn-outline-secondary'>Ver perfil</button>
								                        	<button onclick=\"window.location.href = 'registrarse.php?ID=".$row['ID']."';\" class='btn btn-sm btn-outline-secondary'>Editar</button>
							                        		<button class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#mod".$row['ID']."'>Eliminar</button>
							                    		</div>
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
														                Seguro deseas borrar a este cliente?
														            </div>
														            <div class='modal-footer'>
														                <button type='button' class='btn btn-primary' onclick=\"window.location.href='php/deleteCliente.php?id=".$row['ID']."';\">Continuar</button>
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
							<form id="form0" action="" method="post">
						        <?php 
						       		if(@$_GET['vc'] == 1){
						       			echo "
						       			<a class='btn btn-primary' href='admin.php' role='button'>Ver top</a>
						        		";
						       		}else{
						       			echo "
						       			<a class='btn btn-primary' href='admin.php?vc=1' role='button'>Ver todos</a>
						        		";
						       		}
						       	 ?>
							</form>
						</div>
					</div>
			        <!-- Productos LISTO -->
	        		<div class="row abs block" id="15">
	        			<div class="col-md-12">
	        				<h4>Productos <a class='btn btn-primary' href='agregarproducto.php'  role='button'><i class="fas fa-plus"></i> Agregar producto</a> </h4>
		        			<div class='table-responsive'>
								<table class="table">
									<thead>
										<tr>
											<th>Descripción</th>
											<th>P. Unitario</th>
											<th>Entradas</th>
											<th>Existencias</th>
											<th>C. Promedio</th>
											<th>Imagen</th>
											<th>Altura</th>
											<th>Categoria</th>
											<th>Cod prov</th>
											<th>Fecha Agregada</th>
											<th>Acciones</th>	
										</tr>
									</thead>
									<tbody>
										<?php 
											$query = mysqli_query($con, "SELECT * FROM productos");
											$clase = "";
											$cont = 0;
											while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
												$cont++;
												if ($row['stock'] == 0){
													$clase = "table-danger";
												}else if($row['stock'] < 3){
													$clase = "";
												}else{
													$clase = "";
												}
												echo "
													<tr class='".$clase."' >
														<td data-toggle='tooltip' data-placement='top' title='Descripcion del producto.'>".$row['Descripcion']."</td>
														<td data-toggle='tooltip' data-placement='top' title='Precio Unitario.'>
															<div class='input-group mb-2 mr-sm-2'>
																<div class='input-group-prepend'>
																	<div class='input-group-text'>$</div>
																</div>
																<input type='number' value='".$row['precio']."' id='PU".$row['ID']."'
																  class='form-control' placeholder='USD' onkeypress='keyPressPU(event)'>
																<div class='input-group-prepend'>
																	<div class='input-group-text'>.00</div>
																</div>
															</div>
														</td>
														<td>
															<input type='number' 
																class='form-control cantidad' value='0' id='entradas".$row['ID']."'
																style='width:100%' min='0' max='100' onkeypress='keyPressX(event)' data-toggle='tooltip' data-placement='top' 
																title='Estas son las entradas del producto (compras).'>
														</td>
														<td>
															<input type='number' id='idX".$row['ID']."'
																class='form-control cantidad' name='number".$cont."' value='".$row['stock']."' 
																style='width:100%' min='0' max='100' data-toggle='tooltip' data-placement='top' 
																title='Ingrese un nuevo numero y presione enter para cambiar el valor del stock.'>
														</td>
														<td>
															$".substr($row['costo_promedio'], 0, 5)." USD
														</td>
														<td data-toggle='tooltip' data-placement='top' 
														title='Imagen del producto. Presione en el url para ver la imagen.'>
															<button class='btn btn-link' data-toggle='modal' data-target='#modal".$row['ID']."'>
																<img src='".$row['url_img']."' style='width:25px;height:25px;' class='img-thumbnail'> ".$row['url_img']."
															</button>
															<!-- Modal -->
															<div class='modal fade' id='modal".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
																<div class='modal-dialog' role='document'>
																	<div class='modal-content'>
																		<div class='modal-header'>
																			<label>".$row['Descripcion']."</label>
																			<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																			<span aria-hidden='true'>&times;</span>
																			</button>
																		</div>
																		<div class='modal-body'>
																			<img src='".$row['url_img']."' class='img-fluid' style='width:100%;height:auto;'>
																		</div>
																	</div>
																</div>
															</div>
														</td>
														<td data-toggle='tooltip' data-placement='top' 
														title='Altura de la imagen en pixeles '>".$row['alto']."</td>
														<td data-toggle='tooltip' data-placement='top' 
														title='Categoria a la que pertenece el producto'>".$row['Categoria']."</td>													
														<td data-toggle='tooltip' data-placement='top' 
														title='Codigo del proveedor'>".$row['cod_prov']."</td>
														<td data-toggle='tooltip' data-placement='top' 
														title='Fecha en la que se ingreso por primera vez en el sistema.'>".$row['Fecha_insert']."</td>
														<td>
															<div class='btn-group'>
																<button onclick=\"window.location.href = 'agregarproducto.php?id=".$row['ID']."&img=".$row['url_img']."&price=".$row['precio']."&stock=".$row['stock']."&val=".$row['Descripcion']."&alto=".$row['alto']."';\"
																		class='btn btn-warning btn-sm' data-toggle='tooltip' data-placement='top' 
																		title='Editar el producto. Es necesario ingresar la mayoria de los campos.'><i class='fas fa-edit'></i> Editar</button>
															
																<button class='btn btn-sm btn-danger' data-toggle='modal' 
																	data-target='#modalDel".$row['ID']."'
																	title='Eliminar el producto. Desaparecera por completo.'><i class='fas fa-trash'></i> Eliminar</button>
																<!-- Modal -->
																<div class='modal fade' id='modalDel".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
																	<div class='modal-dialog' role='document'>
																		<div class='modal-content'>
																			<div class='modal-header'>
																				<h5 class='modal-title' id='modalLabel'>Mensaje</h5>
																				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																				<span aria-hidden='true'>&times;</span>
																				</button>
																			</div>
																			<div class='modal-body'>
																				Seguro deseas borrar este producto?
																			</div>
																			<div class='modal-footer'>
																				<button type='button' class='btn btn-primary' onclick=\"window.location.href='php/deleteProd.php?id=".$row['ID']."';\">Continuar</button>
																				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
																			</div>
																		</div>
																	</div>
																</div>

															</div>
														</td>
													</tr>
												";
											}
											?>
									</tbody>
								</table>
							</div>
							<script>
								function keyPressX(event){
									//var key = ;
									if (event.keyCode == 13) {
										//console.log("se cambio el valor "+event.currentTarget.id);
										var id = event.currentTarget.id;
										var val = event.currentTarget.value;
										//console.log(id);
										if(id.length < 10){
											id = id.substr(-1);
										}else{
											id = id.substr(-2);
										}
										window.location.href = 'php/addEntradas.php?id='+id+"&entrada="+val;
									}
								}
								function keyPressPU(event){
									//var key = ;
									if (event.keyCode == 13) {
										//console.log("se cambio el valor "+event.currentTarget.id);
										var id = event.currentTarget.id;
										var val = event.currentTarget.value;
										//console.log(id);
										if(id.length < 4){
											id = id.substr(-1);
										}else{
											id = id.substr(-2);
										}
										window.location.href = 'php/addPU.php?id='+id+"&pu="+val;
									}
								}
							</script>

	        			</div>
					</div>
					<!-- Proveedores LISTO -->
	        		<div class="row abs block" id="16">
	        			<div class="col-md-12">
	        				<h4>Proveedores</h4>
		        			<table class="table">
		        				<thead>
		        					<tr>
		        						<th>ID</th>
		        						<th>Nombres</th>
		        						<th>Direccion</th>
		        						<th>Telefonos</th>
		        						<th>Empresa</th>
		        						<th>Correo</th>
	        							<th>CP</th>
	        							<th>Opciones</th>
	        						</tr>
		        				</thead>
		        				<tbody>
		        					<?php 
		        						$query = mysqli_query($con, "SELECT * FROM proveedores");
		        						while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		        							echo "
		        								<tr>
		        									<td>".$row['ID']."</td>
													<td>".$row['Nombre']."</td>
													<td>".$row['Direccion']."</td>
													<td>".$row['Telefono']."</td>
		        									<td>".$row['Empresa']."</td>
		        									<td>".$row['Correo']."</td>
		        									<td>".$row['CP']."</td>
	        										<td>
	        											<div class='btn-group'>
		        											<button onclick=\"window.location.href = 'agregarproveedor.php?id=".$row['ID']." '\" class='btn btn-sm btn-outline-secondary'>Editar</button>
								                		
								                			<button class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#prov".$row['ID']."'>Eliminar</button>
							                				<!-- Modal -->
															<div class='modal fade' id='prov".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
															    <div class='modal-dialog' role='document'>
															        <div class='modal-content'>
															            <div class='modal-header'>
															                <h5 class='modal-title' id='modalLabel'>Mensaje</h5>
															                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
															                <span aria-hidden='true'>&times;</span>
															                </button>
															            </div>
															            <div class='modal-body'>
															                Seguro deseas borrar este proveedor?
															            </div>
															            <div class='modal-footer'>
															                <button type='button' class='btn btn-primary' onclick=\"window.location.href='php/deleteProv.php?id=".$row['ID']."';\">Continuar</button>
															                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
															            </div>
															        </div>
															    </div>
															</div>

							                			</div>
	        										</td>
		        								</tr>
		        							";
		        						}
		        					 ?>
		        				</tbody>
		        			</table>
		        			<a class='btn btn-primary' href='agregarproveedor.php'  role='button'>Agregar proveedor</a>
	        			</div>
					</div>	
					<!-- Pedidos LISTO -->
	        		<div class="row abs block" id="13">
			          <div class="col-md-12">
					  	<h4>Generar reporte</h4>
						<form action="php/reporteVentas.php" method="post">
							<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<!-- <label for=''>Ver por: </label> -->
											<select id='opt' name='opt' class="form-control">
												<option value='1'>Día</option>
												<option value='2'>Mensual</option>
												<option value='3'>Anual</option>
												<option value='4'>Todos</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<!-- <label for=''>Fecha: </label> -->
										<div class="form-group">
											<input id='date' class="form-control" type="date" name="fecha">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<button class="btn btn-outline-secondary btn-block">Aceptar</button>
										</div>
									</div>
							</div>
						</form>

			            <h4>Pedidos</h4>
			            <table class="table">
							<thead>
								<tr>
									<th>Pedido</th>
									<th>Cliente</th>
									<th>Fecha</th>
									<th>Estado</th>
									<th>Total</th>
									<th>Acciones</th>
								</tr>

							</thead>
							<tbody> 
								<?php 

									$tmp = "";
									$money = 0;
									if(@$_GET['date'] != ""){
										$tmp = $_GET['date'];
									}
										
									$result = mysqli_query($con, "SELECT p.*, c.Nombres, c.Apellidos, p.ID_Cliente FROM pedidos p, clientes c 
											WHERE p.ID_Cliente = c.ID ".$tmp);

									while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										$nombreCompleto = $row['Nombres']." ".$row['Apellidos'];
										$estado = "";
										$fecha = castDate($row['fecha']);
		
										switch($row['status']){
											case 0:
												$estado = "En espera";
												break;
											case 1:
												$estado = "Completado";
												break;
											
										} 
										echo "
											<tr>
												<td>#".$row['ID']."</td>
												<td><a href='perfil.php?id=".$row['ID_Cliente']."'>".$nombreCompleto."</a></td>
												<td>".$fecha."</td>
												<td>".$estado."</td>
												<td><b>$".$row['total'].".00</b> de ".$row['cantidad_total']." productos</td>
												<td>
													<a class='btn btn-warning' href='verpedido.php?id=".$row['ID']."' ><i class='fas fa-search'></i> Ver</a>
													<!-- <button class='btn btn-danger'>Cancelar</button> -->
												</td>
												
											</tr>
										";
									}
								?>
							</tbody> 
						</table>
						<?php
							echo "
								<label class='btn btn-primary' onclick=\"window.location.href='sql.php?data=".@$_GET['data']."&mon=".$money."&value=".@$_GET['value']."&date=".urlencode (@$_GET['date']).";' \" >Imprimir</label>
							";
						?>

			          </div>
			        </div>
			        <!-- Contacto LISTO -->
	        		<div class="row abs block" id="17">
			          <div class="col-md-12">
			            <h4>Contacto y ayuda</h4>
			            <table class="table">
			                <thead>
			                    <tr>
			                        <th>Descripcion</th>
			                        <th>Email</th>
			                        <th>Opciones</th>
			                    </tr>
							</thead>
			                <tbody>
			                    <?php
			                    	
		                            //$query = sqlsrv_query($con, "SELECT * FROM verAlumnos");
		                            $query = mysqli_query($con, "SELECT * FROM contacto ORDER BY ID DESC");
			                  	 	     
			                        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			                            echo "
			                                <tr>
			                                    <td>".$row['Descripcion']."</td>
			                                    <td>".$row['Email']."</td>
			                                    <td>
			                                    	<button onclick=\"window.location.href = 'php/deleteContacto.php?id=".$row['ID']."';\" class='btn btn-sm btn-outline-secondary'>Eliminar</button>
			                                    </td>
			                                </tr>
			                            " ;
			                        }
			                    ?>
			                </tbody>
			            </table>
						</div>
			        </div>
					<!-- Populares LISTO -->
	        		<div class="row abs block" id="18">
	        			<div class="col-md-12">
	        				<h4>Productos populares</h4>
	        				<table class="table">
	        					<thead>
	        						<tr>
	        							<th>Producto</th>
	        							<th>Imagen</th>
	        							<th>Num. Cotizados</th>
	        						</tr>
	        					</thead>
	        					<tbody>
	        						<?php 
				        				$query = mysqli_query($con, "SELECT p.ID, p.alto, pp.ID_Prod, p.url_img, p.Descripcion, p.Fecha_insert,pp.Contador FROM productos p, populares pp WHERE p.ID = pp.ID_Prod ORDER BY pp.Contador DESC")or die(mysqli_error($con));
			                            while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
											echo "
												<tr>
													<td>".$row['Descripcion']."</td>
													<td>
														<button class='btn btn-link' data-toggle='modal' data-target='#modalPop".$row['ID_Prod']."'>
															<img src='".$row['url_img']."' style='width:25px;height:25px;' class='img-thumbnail'> Imagen
														</button>
		        										<!-- Modal -->
														<div class='modal fade' id='modalPop".$row['ID_Prod']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
														    <div class='modal-dialog' role='document'>
														        <div class='modal-content'>
														            <div class='modal-header'>
														                <label>".$row['Descripcion']."</label>
														                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
														                <span aria-hidden='true'>&times;</span>
														                </button>
														            </div>
														            <div class='modal-body'>
														                <img src='".$row['url_img']."' class='img-fluid' style='width:100%;height:auto;'>
														            </div>
														            <div class='modal-footer'>
														                
														            </div>
														        </div>
														    </div>
														</div>
													</td>
													<td>".$row['Contador']."</td>
												</tr>	
											";
										}
									 ?>			
	        					</tbody>
	        				</table>
	        			</div>
	        		</div>
	        		<!-- Reporte ventas PENDIENTE -->
	        		<div class="row abs block" id="110">
	        			<?php 
	        				if (@$_GET['option'] == "1") {
	        					require 'ventas.php';
	        				}
	        				if (@$_GET['option'] == "2") {
	        					require 'abonos.php';
	        				}
	        				if (@$_GET['option'] == null) {
	        					require 'ventas.php';
	        				}
	        			?>
	        		</div>
				</div>
	        </div>    
		</div>	
        <!-- /#page-content-wrapper -->

		<!-- FOOTER 
			<footer class="container">
				<p class="float-right"><a href="#">Arriba</a></p>
				<p>&copy; Aki sewua, Inc. Developers 2018 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos y condiciones</a>
					&middot; <a href="#">Mapa</a></p>
			</footer>
		-->
    <!-- /#wrapper -->
	</div>
	</main>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="js/vendor/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- <script src="js/bootstrap.bundle.js"></script> -->
		<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
		<script src="js/vendor/holder.min.js"></script>
		<!-- -->
		<script src="js/notificationFx.js"></script>
		<script src="js/grayscale.min.js"></script>
	    <script src="js/classie.js"></script>
	    <script src="js/dialogFx.js"></script>
		<!-- Funciones -->
		<script>
			$("#opt").change(function(e){
				var value = e.target.value;
				if (value == 1) {
					$("#date").attr('type','date');
					$("#date").removeAttr('disabled','');
				}
				if (value == 2){
					$("#date").attr('type','month');
					$("#date").removeAttr('disabled','');
				}
				if (value == 3){
					$("#date").attr('type','text');
					$("#date").removeAttr('disabled','');
				}
				if (value == 4){
					$("#date").attr('type','text');
					$("#date").attr('disabled','');
				}
			});
			$("#option").change(function(e){
				var tmp = e.target.value;
				window.location.href="admin.php?rep=1&option="+tmp;
			});

			<?php if (@$_GET['option'] == "1") { ?>
				$("#option").val("1");
			<?php }elseif (@$_GET['option'] == "2") { ?>
				$("#option").val("2");
			<?php } ?>	
		</script>
		<script>
			$(document).ready(function(e){
				var last = 1;
				<?php 
				if (@$_POST['prod']!=""||@$_GET['prod']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#15').attr('class','row abs');
						last = 5;
					";
				}
				if (@$_POST['prod_pen']!=""||@$_GET['prod_pen']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#12').attr('class','row abs');
						last = 2;
					";
				}
				if (@$_POST['prod_fin']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#14').attr('class','row abs');
						last = 4;
					";
				}
				if (@$_POST['pedidos']!=""||@$_GET['pedidos']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#13').attr('class','row abs');
						last = 3;
					";
				}
				if (@$_POST['prov']!=""||@$_GET['prov']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#16').attr('class','row abs');
						last = 6;
					";
				}
				if (@$_POST['coti']!="" || @$_GET['coti']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#19').attr('class','row abs');
						last = 9;
					";
				}
				if (@$_POST['rep']!="" || @$_GET['rep']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#110').attr('class','row abs');
						last = 10;
					";
				}
			 	?>
				$(".menu").click(function(e){
					var id = e.target.id;
					$("#1"+last).attr("class","row abs block");
					last = id;
					$("#1"+id).attr("class","row abs");
				});
			});
		</script>
		<script>
    		$("#menu-toggle").click(function(e) {
        		e.preventDefault();
        		$("#wrapper").toggleClass("toggled");
    		});
    		$(".menu").click(function(e) {
        		e.preventDefault();
        		$("#wrapper").toggleClass("toggled");
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
	        <?php if(@$_POST['prod']!=""){ ?>
	        // create the notification
	        var notification = new NotificationFx({
	            message : '<p><?php echo @$_POST['prod'];?></p>',
	            layout : 'growl',
	            effect : 'jelly',
	            type : 'notice', // notice, warning, error or success
	            
	        });

	        // show the notification
	        notification.show();
	        <?php } ?>
	        /* */
	        <?php if(@$_POST['pedidos']!=""){ ?>
	        // create the notification
	        var notification = new NotificationFx({
	            message : '<p><?php echo @$_POST['pedidos'];?></p>',
	            layout : 'growl',
	            effect : 'jelly',
	            type : 'notice', // notice, warning, error or success
	            
	        });

	        // show the notification
	        notification.show();
	        <?php } ?>
	         /* */
	        <?php if(@$_POST['prod_fin']!=""){ ?>
	        // create the notification
	        var notification = new NotificationFx({
	            message : '<p><?php echo @$_POST['prod_fin'];?></p>',
	            layout : 'growl',
	            effect : 'jelly',
	            type : 'notice', // notice, warning, error or success
	            
	        });

	        // show the notification
	        notification.show();
	        <?php } ?>

	        <?php if(@$_POST['prod_cancel']!=""){ ?>
	        // create the notification
	        var notification = new NotificationFx({
	            message : '<p><?php echo @$_POST['prod_cancel'];?></p>',
	            layout : 'growl',
	            effect : 'jelly',
	            type : 'notice', // notice, warning, error or success
	            
	        });

	        // show the notification
	        notification.show();
	        <?php } ?>

	        <?php if(@$_POST['prov']!=""){ ?>
	        // create the notification
	        var notification = new NotificationFx({
	            message : '<p><?php echo @$_POST['prov'];?></p>',
	            layout : 'growl',
	            effect : 'jelly',
	            type : 'notice', // notice, warning, error or success
	            
	        });

	        // show the notification
	        notification.show();
	        <?php } ?>

	        <?php if(@$_POST['coti']!=""){ ?>
	        // create the notification
	        var notification = new NotificationFx({
	            message : '<p><?php echo @$_POST['coti'];?></p>',
	            layout : 'growl',
	            effect : 'jelly',
	            type : 'notice', // notice, warning, error or success
	            
	        });

	        // show the notification
	        notification.show();
	        <?php } ?>
	    </script>
		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();   
			});
		</script>
	</body>
</html>
