<?php 
	require 'php/conexion.php';
	require 'php/isLogin.php';
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
			table, th, td ,tr{
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
			}
			@page {
			   margin: 6% 0px;
			}
			
		</style>
	</head>
	<body>

		<main role='main'>
			<div class="container">
				<h1>Reporte de Ventas</h1>
				<?php 
					if (@$_GET['data'] != "") {
						if ($_GET['data'] == 1) { //dia
							echo "
								<label><b>Día: </b>".$_GET['value']."</label>
							";
						}
						if ($_GET['data'] == 2) { //mes
							echo "
								<label><b>Mensual: </b>".$_GET['value']."</label>
							";
						}
						if ($_GET['data'] == 3) { //año
							echo "
								<label><b>Anual: </b>".$_GET['value']."</label>
							";
						}
					}
				 ?>
				 <br>
				<label><b>Ingresos:</b> $<span ><?php echo @$_GET['mon']; ?>.00</span> USD</label>
			</div>
			<div class="container" id="muestra">
				<table class="table table-sm" style="border: .1em solid #000;">
					<thead style="background: #e5e5e5">
						<tr>
							<th>Nombre cliente</th>
							<th>Concepto venta</th>
							<th>ID. Producto</th>
							<th>Ingreso o dep.</th>
							<th>Fecha</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$tmp = "";
							if(@$_GET['date'] != ""){
								$tmp = $_GET['date'];
							}

							if (@$_GET['option'] == "2") {
								$query = "SELECT c.Nombres, c.Apellidos, coti.ID_Prod,pp.Concepto_venta, pp.Monto_inicial, pp.Fecha_final FROM pedidos_proceso pp, cotizaciones coti, clientes c WHERE pp.ID_Coti = coti.ID AND coti.ID_User = c.ID AND pp.status = 0 ORDER BY pp.ID DESC";
									$result = mysqli_query($con, $query) or die(mysqli_error($con));
								 	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								 		echo "
								 			<tr>
								 				<td>".$row['Nombres']." ".$row['Apellidos']."</td>
								 				<td>".$row['Concepto_venta']."</td>
								 				<td>".$row['ID_Prod']."</td>
								 				<td>".$row['Monto_inicial'].".00 USD</td>
								 				<td>".$row['Fecha_final']."</td>
								 			</tr>
								 		";
								 	}
							}else{
								$query = "SELECT pp.Concepto_venta, c.Nombres, c.Apellidos, coti.ID_Prod, pp.Monto_total, pp.Fecha_final FROM pedidos_proceso pp, cotizaciones coti, clientes c WHERE pp.ID_Coti = coti.ID AND coti.ID_User = c.ID AND pp.status = 1 ".$tmp;
								$result = mysqli_query($con, $query) or die(mysqli_error($con));
							 	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							 		echo "
							 			<tr>
							 				<td>".$row['Nombres']." ".$row['Apellidos']."</td>
							 				<td>".$row['Concepto_venta']."</td>
							 				<td>".$row['ID_Prod']."</td>
							 				<td>".$row['Monto_total'].".00 USD</td>
							 				<td>".$row['Fecha_final']."</td>
							 				
							 			</tr>
							 		";
							 	}
							}
						 	
						 ?>
					</tbody>
				</table>
				<div>
					<button onclick="print()">Imprimir</button>
				</div>
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
	</script>

</html>