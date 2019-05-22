<?php 
	require 'php/conexion.php';
	require 'php/isLogin.php';
	require 'php/fecha.php';

	if ($_SESSION['root'] != 1) {
		header("Location: perfil.php");
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="img/index/logo.jpg">

		<title>Aki sewua</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/index.css" rel="stylesheet">

		<script src="js/modernizr.custom.js"></script>
		<style type="text/css">
			/* table, th, td ,tr{
			    border: .1em solid #000;
			}
			.table thead th {
			    vertical-align: bottom;
			    border-bottom: .1em solid #000;
			}
			.table td, .table th {
			    padding: .75rem;
			    vertical-align: top;
			    border-top: .1em solid #000; 
			} */

			.table th, td {
				border: none;
				text-align: left;
				padding: 8px;
			}

			@page {
			   margin: 6% 0px;
			}
			
		</style>
	</head>
	<body>

		<main role='main'>
			<div class="container mt-2">
				<center>
					<img src="img/index/logo.jpg" alt="" width="150px" height='150px'>
				</center>
				<h1 class='text-center'>AKISEWUA SA DE CV</h1>
				<h4 class='text-center mb-4'>Reporte de Ventas</h4>
				<div class="row">
					<div class="col">
						<p style='font-size:17px'> <b>Total:</b> $<span id='money'>50</span> USD  </p>
					</div>
					<div class="col">
						<p style='font-size:17px;text-align: right;'> <b>Fecha:</b> 
							<?php 
								if(@$_GET['data'] != ""){ 
									if(@$_GET['data'] == 1){
										echo castDate(@$_GET['value']);
									}
									if(@$_GET['data'] == 2){
										echo @$_GET['value'];
									}
									if(@$_GET['data'] == 3){
										echo @$_GET['value'];
									}
								}else{
									echo "TODO";
								} 
							?> 
						</p>
					</div>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Pedido</th>
							<th>Cliente</th>
							<th>Fecha</th>
							<th>Estado</th>
							<th>Total</th>
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
								$money += $row['total'];
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
										<td>".$nombreCompleto."</td>
										<td>".$fecha."</td>
										<td>".$estado."</td>
										<td><b>$".$row['total'].".00</b> de ".$row['cantidad_total']." productos</td>
									</tr>
								";
							}
							echo "
								<script>
									document.getElementById('money').innerHTML  = ".$money.";
								</script>
							";
						?>
					</tbody> 
				</table>
				<!-- <button onclick="print()">Imprimir</button> -->

			</div>
		</main>
		
	</body>
	<script type="text/javascript">
		
		function imprSelec(muestra){
			var ficha = document.getElementById(muestra);
			var ventimp = window.open(' ','popimpr');
			ventimp.document.write(ficha.innerHTML);
			ventimp.document.close();
			ventimp.print();
			ventimp.close();
		}
		print();
	</script>

</html>