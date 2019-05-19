<?php require 'php/isLogin.php';
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
	                <li><a href="#" id="9" class="menu">Cotizaciones</a></li>
	                <li><a href="#" id="3" class="menu">Pedidos</a></li>
	                <li><a href="#" id="4" class="menu">Pedidos finalizados</a></li>
	                <li><a href="#" id="8" class="menu">Productos populares</a></li>
	                <li><a href="#" id="10" class="menu">Reporte de ventas</a></li>
	                <li><a href="#" id="6" class="menu">Mensajes</a></li>
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
						<div class="col-md-10">
							<h4>Clientes nuevos (top 5)</h4>
							<table class="tablaAlum">
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
	        			<div class="col-md-10">
	        				<h4>Productos</h4>
		        			<table class="tablaAlum">
		        				<thead>
		        					<tr>
		        						<th>ID</th>
		        						<th>Descripción</th>
		        						<th>Imagen</th>
		        						<th>Altura</th>
		        						<th>Categoria</th>
	        							<th>Fecha Agregada</th>
	        							<th>Opciones</th>
	        							
	        						</tr>
		        				</thead>
		        				<tbody>
		        					<?php 
		        						$query = mysqli_query($con, "SELECT * FROM productos");
		        						while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		        							echo "
		        								<tr>
		        									<td>".$row['ID']."</td>
		        									<td>".$row['Descripcion']."</td>
		        									<td>
		        									<button class='btn btn-link' data-toggle='modal' data-target='#modal".$row['ID']."'><img src='php/getImg.php?ID=".$row['ID']."' style='width:25px;height:25px;' class='img-thumbnail'> Imagen</button>
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
													                <img src='php/getImg.php?ID=".$row['ID']."' class='img-fluid' style='width:100%;height:auto;'>
													            </div>
													        </div>
													    </div>
													</div>
		        									</td>
		        									<td>".$row['alto']."</td>
		        									<td>".$row['Categoria']."</td>
		        									<td>".$row['Fecha_insert']."</td>
	        										<td>
	        											<div class='btn-group'>
		        											<button onclick=\"window.location.href = 'agregarproducto.php?id=".$row['ID']."&val=".$row['Descripcion']."&alto=".$row['alto']."';\" class='btn btn-sm btn-outline-secondary'>Editar</button>
								                		
								                			<button class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalDel".$row['ID']."'>Eliminar</button>
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
		        			<a class='btn btn-primary' href='agregarproducto.php'  role='button'>Agregar producto</a>
	        			</div>
					</div>
					<!-- Cotizaciones LISTO -->
	        		<div class="row abs block" id="19">
			          <div class="col-md-10">
			            <h4>Cotizaciones</h4>
			            <table class="tablaAlum">
			                <thead>
			                    <tr>
			                        <th>Descripción</th>
			                        <th>Nombre cliente</th>
			                        <th>Fecha</th>
			                        <th>Opciones</th>
			                    </tr>
							</thead>
			                <tbody>
			                    <?php
			                    	$query = mysqli_query($con, 
		                            	"SELECT p.ID, p.ID_Prod,p.ID_User, p.Descripcion, c.Nombres,c.Apellidos,p.status,p.Fecha, pp.alto FROM clientes c, cotizaciones p, productos pp WHERE pp.ID = p.ID_Prod AND c.ID = p.ID_User ORDER BY ID DESC");
			                  	 	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			                        	if ($row['status'] < 2) {
			                        		echo "
				                                <tr>
				                                    <td>".$row['Descripcion']."</td>
				                                    <td>".$row['Nombres']." ".$row['Apellidos']."</td>
				                                    <td>".$row['Fecha']."</td>
			                                    	<td>
			                                    		<div class='btn-group' role='group'>

			                                    			<button onclick=\"window.location.href = 'vercotizacion.php?id=".$row['ID']."';\" class='btn btn-sm btn-outline-secondary'>Ver cotización</button>
	                            			";
	                        				if ($row['status'] == 1) {
                        						echo "
                        									<button onclick=\"window.location.href = 'mensajes.php?id=".$row['ID']."&nusr=".$row['ID_User']."';\" class='btn btn-sm btn-outline-secondary'>Mensajes</button>
                        						";
	                        				}
	                            			echo "
			                                    			<button class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modalCoti".$row['ID']."'>Cancelar</button>
		                                    			</div>
			                                    		<!-- Modal -->
														<div class='modal fade' id='modalCoti".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
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
														                <button type='button' class='btn btn-primary' onclick=\"window.location.href='php/cancelarCotizacion.php?id=".$row['ID']."';\">Continuar</button>
														                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
														            </div>
														        </div>
														    </div>
														</div>
													</td>
			                                    </tr>
				                            " ;
			                        	}else{
			                        		if (@$co == 1) {
			                        			echo "
					                                <tr>
					                                    <td>".$row['Descripcion']."</td>
					                                    <td>".$row['Nombres']." ".$row['Apellidos']."</td>
					                                    <td>".$row['Fecha']."</td>
				                                    	<td>
				                                    		<div class='btn-group' role='group'>
															<button onclick=\"window.location.href = 'vercotizacion.php?id=".$row['ID']."';\" class='btn btn-sm btn-outline-secondary'>Ver cotización</button>
		                            			";
		                        				if ($row['status'] == 1) {
		                        					echo "<button onclick=\"window.location.href = 'mensajes.php?id=".$row['ID']."&nusr=".$row['ID_User']."';\" class='btn btn-sm btn-outline-secondary'>Mensajes</button>";
		                        				}
		                            			echo "
				                                    		<button data-toggle='modal' data-target='#modal".$row['ID']."' class='btn btn-sm btn-outline-secondary'>Eliminar</button>
				                                    		<!-- Modal -->
															<div class='modal fade' id='modal".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
															    <div class='modal-dialog' role='document'>
															        <div class='modal-content'>
															            <div class='modal-header'>
															                <h5 class='modal-title' id='modalLabel'>Mensaje</h5>
															                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
															                <span aria-hidden='true'>&times;</span>
															                </button>
															            </div>
															            <div class='modal-body'>
															                Seguro deseas eliminar esta cotización?
															            </div>
															            <div class='modal-footer'>
															                <button type='button' class='btn btn-primary' onclick=\"window.location.href='php/deleteCotizacion.php?id=".$row['ID']."';\">Continuar</button>
															                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
															            </div>
															        </div>
															    </div>
															</div>
															
				                                    		</div>	
				                                    	</td>
				                                    </tr>
					                            " ;
			                        		}
			                        	}


			                        }
			                        
			                    ?>
			                </tbody>
			            </table>
		            		<form id="form1" action="" method="post">
		                   	<?php 
		                    	if (@$co == 0) {
		                    		echo "
		                    		<a class='btn btn-primary' href='admin.php?co=1&coti=1' id='2' role='button'>Ver todos</a>
		                    		";		
		                    	}else{
		                    		echo "
		                    		<a class='btn btn-primary' href='admin.php?coti=1' id='2' role='button'>Ocultar</a>
		                    		";
		                    	}
		                     ?>
		                    </form>
			          </div>
			        </div>
					<!-- Pedidos LISTO -->
	        		<div class="row abs block" id="13">
			          <div class="col-md-12 ">
			            <h4>Pedidos en proceso</h4>
			            <table class="tablaAlum">
			                <thead>
			                    <tr>
			                        <th>Num. Pedido</th>
			                        <th>Nombre cliente</th>
			                        <th>Descripción</th>
			                        <th>Concepto venta</th>
			                        <th>Fecha entrega</th>
									<th>Opciones</th>
								</tr>
							</thead>
			                <tbody>
			                    <?php
			                    	$query = mysqli_query($con, "SELECT pp.ID,pp.ID_Coti, c.Nombres, pp.Descripcion,pp.Concepto_venta, pp.Monto_inicial, pp.Monto_total, pp.Fecha_inicio, pp.Fecha_final, pp.status, coti.ID_User FROM pedidos_proceso pp, clientes c, cotizaciones coti WHERE pp.ID_Coti = coti.ID AND coti.ID_User = c.ID ORDER BY pp.ID DESC");
		                  	 	    $estado = "Proceso";
			                        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			                        	if ($row['status'] == 0) {
			                        		echo "
				                                <tr>
				                                    <td>".$row['ID']."</td>
				                                    <td>".$row['Nombres']."</td>
				                                    <td>".$row['Descripcion']."</td>
				                                    <td>".$row['Concepto_venta']."</td>
													<td>".$row['Fecha_final']."</td>
				                                    <td>
					                                    <div class='btn-group' role='group'>
					                                    	<button onclick=\"window.location.href = 'verpedido.php?id=".$row['ID']."';\" class='btn btn-sm btn-outline-secondary'>Ver pedido</button>
					                                    	<button onclick=\"window.location.href = 'mensajes.php?id=".$row['ID_Coti']."&nusr=".$row['ID_User']."&ped=".$row["ID"]."';\" class='btn btn-sm btn-outline-secondary'>Mensajes</button>
				                                    		<button onclick=\"window.location.href='cancelar-pedido.php?id=".$row['ID']."';\" class='btn btn-sm btn-outline-secondary'>Cancelar pedido</button>
				                                    		<!-- Modal 
															<div class='modal fade' id='modalCan".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
															    <div class='modal-dialog' role='document'>
															        <div class='modal-content'>
															            <div class='modal-header'>
															                <h5 class='modal-title' id='modalLabel'>Mensaje</h5>
															                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
															                <span aria-hidden='true'>&times;</span>
															                </button>
															            </div>
															            <div class='modal-body'>
															                Seguro deseas cancelar este pedido?
															            </div>
															            <div class='modal-footer'>
															                <button type='button' class='btn btn-primary' onclick=\"window.location.href='php/cancelarPedidoProceso.php?id=".$row['ID']."&id_user=".$row['ID_User']."';\">Continuar</button>
															                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
															            </div>
															        </div>
															    </div>
															</div>
															-->
				                                    	</div>
				                                    </td>
												</tr>
				                            " ;
			                            }else{
			                            	if (@$ped == 1) {
			                            		if ($row['status'] == 1) {
			                            			$estado = "Finalizado";
			                            		}elseif ($row['status'] == 2) {
			                            			$estado = "Cancelado";
			                            		}
			                            		echo "
					                                <tr>
						                                <td>".$row['ID']."</td>
					                                    <td>".$row['Nombres']."</td>
					                                    <td>".$row['Descripcion']."</td>
					                                    <td>".$row['Concepto_venta']."</td>
														<td>".$row['Fecha_final']."</td>
					                                    <td>
						                                    <div class='btn-group' role='group'>
						                                    	<button onclick=\"window.location.href = 'verpedido.php?id=".$row['ID']."';\" class='btn btn-sm btn-outline-secondary'>Ver pedido</button>
						                                    	<button onclick=\"window.location.href = 'mensajes.php?id=".$row['ID_Coti']."&nusr=".$row['ID_User']."&ped=".$row["ID"]."';\" class='btn btn-sm btn-outline-secondary'>Mensajes</button>
					                                    	</div>
					                                    </td>
													</tr>
					                            " ;
			                            	}
			                            }
			                            $estado = "Proceso";
			                        }
			                        
			                    ?>
			                </tbody>
			            </table>
		            		<?php 
		                    	if (@$ped == 0) {
		                    		echo "
		                    		<a class='btn btn-primary' href='admin.php?ped=1&pedidos=1' id='2' role='button'>Ver todos</a>
		                    		";		
		                    	}else{
		                    		echo "
		                    		<a class='btn btn-primary' href='admin.php?pedidos=1' id='2' role='button'>Ocultar</a>
		                    		";
		                    	}
	                     	?>
		                    	
			          </div>
			        </div>
			        <!-- Pedido_Fin LISTO -->
	        		<div class="row abs block" id="14">
			          <div class="col-md-10">
			            <h4>Pedidos finalizados</h4>
			            <table class="tablaAlum">
			                <thead>
			                    <tr>
			                        <th>Nombre cliente</th>
			                        <th>Producto</th>
			                        <th>Estado</th>
			                        <th>Fecha finalizado</th>
			                        <th>Opciones</th>
			                    </tr>
							</thead>
			                <tbody>
			                    <?php
			                    	$query = mysqli_query($con, "SELECT pp.ID,pp.Descripcion, pp.Concepto_venta,coti.ID_Prod, c.Nombres, c.Apellidos, pp.status, pp.Fecha_final FROM pedidos_proceso pp, cotizaciones coti, clientes c WHERE pp.ID_Coti = coti.ID AND coti.ID_User = c.ID AND pp.status > 0 ORDER BY pp.ID DESC");
			                  	 	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			                        	if($row['status'] == 1){
			                        		$estado = "Finalizado";
			                        	}else if($row['status'] == 2){
			                        		$estado = "Cancelado";
			                        	}
										echo "
			                                <tr>
			                                    <td>".$row['Nombres']." ".$row['Apellidos']."</td>
			                                    <td>
		        									<button class='btn btn-link' data-toggle='modal' data-target='#modalImg".$row['ID_Prod']."'><img src='php/getImg.php?ID=".$row['ID_Prod']."' style='width:25px;height:25px;' class='img-thumbnail'> Imagen</button>
	        										<!-- Modal -->
													<div class='modal fade' id='modalImg".$row['ID_Prod']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
													    <div class='modal-dialog' role='document'>
													        <div class='modal-content'>
													            <div class='modal-header'>
													                <label>".$row['Concepto_venta']."</label>
													                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													                <span aria-hidden='true'>&times;</span>
													                </button>
													            </div>
													            <div class='modal-body'>
													                <img src='php/getImg.php?ID=".$row['ID_Prod']."' class='img-fluid' style='width:100%;height:auto;'>
													            </div>
													        </div>
													    </div>
													</div>
	        									</td>
			                                    <td>".$estado."</td>
			                                    <td>".$row['Fecha_final']."</td>
			                                    <td>
			                                    	<button class='btn btn-sm btn-outline-secondary' data-toggle='modal' data-target='#modal".$row['ID']."'>Eliminar</button>
			                                    	<!-- Modal -->
													<div class='modal fade' id='modal".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
													    <div class='modal-dialog' role='document'>
													        <div class='modal-content'>
													            <div class='modal-header'>
													                <h5 class='modal-title' id='modalLabel'>Mensaje</h5>
													                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													                <span aria-hidden='true'>&times;</span>
													                </button>
													            </div>
													            <div class='modal-body'>
													                Seguro deseas eliminar este pedido finalizado?
													            </div>
													            <div class='modal-footer'>
													                <button type='button' class='btn btn-primary' onclick=\"window.location.href='php/eliminarFinalizado.php?id=".$row['ID']."';\">Continuar</button>
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

			          </div>
			        </div>
					<!-- Mensajes LISTO -->
			        <div class="row abs block" id="16">
			          <div class="col-md-10">
			            <h4>Mensajes</h4>
			            <table class="tablaAlum">
			                <thead>
			                    <tr>
			                    	<th>Mensaje</th>
			                        <th>Enviado por</th>
			                        <th>Para</th>
			                        <th>Opciones</th>
			                        
		                        </tr>

			                </thead>
			                <tbody>
			                    <?php
			                    	
		                            //$query = sqlsrv_query($con, "SELECT * FROM verAlumnos");
		                            $query = mysqli_query($con, 
		                            	"SELECT * FROM mensajes_coti");
	                  	 	     	
			                        while($row2 = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	                        			//if ($row2['Para'] == $_SESSION['id_user']) {
	                        				echo "
				                                <tr>
				                                    <td>".$row2['Mensaje']." </td>
			                                    	<td>".$row2['De']." </td>
			                                    	<td>".$row2['Para']."</td>
			                                    	<td>
			                                    		<button onclick=\"window.location.href = 'php/eliminarMensaje.php?id=".$row2['ID']."';\" class='btn btn-sm btn-outline-secondary'>Eliminar</button>
			                                    	</td>
				                                </tr>
				                            " ;
	                        			//}
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
			        <!-- Contacto LISTO -->
	        		<div class="row abs block" id="17">
			          <div class="col-md-10">
			            <h4>Contacto y ayuda</h4>
			            <table class="tablaAlum">
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
	        			<div class="col-md-10">
	        				<h4>Productos populares</h4>
	        				<table class="tablaAlum">
	        					<thead>
	        						<tr>
	        							<th>Producto</th>
	        							<th>Imagen</th>
	        							<th>Num. Cotizados</th>
	        						</tr>
	        					</thead>
	        					<tbody>
	        						<?php 
				        				$query = mysqli_query($con, "SELECT p.ID, p.alto, pp.ID_Prod, p.Descripcion, p.Fecha_insert,pp.Contador FROM productos p, populares pp WHERE p.ID = pp.ID_Prod ORDER BY pp.Contador DESC")or die(mysqli_error($con));
			                            while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
											echo "
												<tr>
													<td>".$row['Descripcion']."</td>
													<td>
														<button class='btn btn-link' data-toggle='modal' data-target='#modalPop".$row['ID_Prod']."'><img src='php/getImg.php?ID=".$row['ID_Prod']."' style='width:25px;height:25px;' class='img-thumbnail'> Imagen</button>
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
														                <img src='php/getImg.php?ID=".$row['ID_Prod']."' class='img-fluid' style='width:100%;height:auto;'>
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
				if (@$_POST['mensajes']!="") {
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

	        <?php if(@$_POST['mensajes']!=""){ ?>
	        // create the notification
	        var notification = new NotificationFx({
	            message : '<p><?php echo @$_POST['mensajes'];?></p>',
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
	</body>
</html>
