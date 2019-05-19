<div class="col-md-10">
	<form action="php/reporteVentas.php" method="POST">
		<div class="form-group">
			<div class="row">
				<div class="col-md-3" style="">
					<h4>Reporte de ventas</h4>
				</div>
				<div class="col-md-3">
					<select id="option" class="form-control" name="option">
						<option value="1">Ventas</option>
						<option value="2">Anticipos</option>
					</select>
				</div>	
			</div>
		</div>

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
		<label><b>Ingresos:</b> <span id='m'></span> USD</label><br>
		
		<!-- <label><b>sql:</b> <?php //if(@$_GET['date'] != ""){echo $tmp = $_GET['date'];} ?></label> -->
		
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
		<table class="tablaAlum">
			<thead>
				<tr>
					<th>Nombre cliente</th>
					<th>Concepto venta y producto</th>
					<th>Ingreso</th>
					<th>Fecha</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$tmp = "";
					$money = 0;
					if(@$_GET['date'] != ""){
						$tmp = $_GET['date'];
					}
					$query = "SELECT c.Nombres, c.Apellidos, coti.ID_Prod,pp.Concepto_venta, pp.Monto_total, pp.Fecha_final FROM pedidos_proceso pp, cotizaciones coti, clientes c WHERE pp.ID_Coti = coti.ID AND coti.ID_User = c.ID AND pp.status = 1 ".$tmp." ORDER BY pp.ID DESC";
				 	$result = mysqli_query($con, $query);
				 	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				 		$date1 = new DateTime($row['Fecha_final']);
				 		echo "
			 			<tr>
			 				<td>".$row['Nombres']." ".$row['Apellidos']."</td>
			 				<td>".$row['Concepto_venta']."
								<label class='btn btn-link' data-toggle='modal' data-target='#modalImg2".$row['ID_Prod']."'><img src='php/getImg.php?ID=".$row['ID_Prod']."' style='width:25px;height:25px;' class='img-thumbnail'> Imagen</label>
								<!-- Modal -->
								<div class='modal fade' id='modalImg2".$row['ID_Prod']."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
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
			 				<td>".$row['Monto_total']." USD</td>
		 					<td>".$date1->format('d/m/Y')."</td>
		 				</tr>
				 		";
				 		$money += $row['Monto_total'];
				 	}
				 	echo "
				 	<script>
						document.getElementById('m').innerHTML  = ".$money.";
					</script>";
				 ?>			
			</tbody>
		</table>
	</form>
	<?php
		echo "
		<label class='btn btn-primary' onclick=\"window.location.href='sql.php?data=".@$_GET['data']."&mon=".$money."&value=".@$_GET['value']."&date=".urlencode (@$_GET['date']).";' \" >Imprimir</label>
		";
	?>
</div>