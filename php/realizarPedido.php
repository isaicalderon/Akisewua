<?php 
	require 'conexion.php';
	require 'fecha.php';

	//$id_user = $_POST['id_user'];
	//$id_prod = $_POST['id_prod'];
	$id_coti = $_POST['id_coti'];
	$descripcion = $_POST['descripcion'];
	$concepto = $_POST['concepto'];
	
	$monto_inicial = $_POST['monto_inicial'];
	$monto_final = $_POST['monto_final'];
	$date = new DateTime($_POST['fecha_entrega']);
	$fecha_entrega = $date->format('d/m/Y');

	//echo "Pedido para el UserID: ".$id_user."<br> Con el productoID: ".$id_prod."<br>Con un monto incial: ".$monto_inicial."<br>
	//Monto final: ".$monto_final."<br>Fecha de Entrega: ".$fecha_entrega;
	
	mysqli_query($con, "INSERT INTO pedidos_proceso(ID_Coti, Descripcion, Concepto_venta, Monto_inicial, Monto_total, Fecha_inicio, Fecha_final, status) VALUES
		('$id_coti', '$descripcion', '$concepto','$monto_inicial','$monto_final','$fechausuario','$fecha_entrega','0')") or die(mysqli_error($con));

	mysqli_query($con, "UPDATE cotizaciones SET status = '2' WHERE ID = ".$id_coti);

	$var = "Pedido creado";
	
	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='pedidos' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";

 ?>