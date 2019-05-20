<?php 
	# Obtenemos la conexion
	require 'conexion.php';

	# Obetenemos el id por GET
	$id = $_GET["id"];
	$errorFatal = false;

	# Verificando que no haya un pedido con este producto
	// $result = mysqli_query($con, "SELECT * from pedidos WHERE ID_Prod = $id") or die(mysqli_error($con));
	// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	// if ($row['ID'] > 0) {
	// 	$errorFatal = true;
    // }
    
	//if ($errorFatal) {

	//}else{
		# Borrando
		mysqli_query($con, "DELETE FROM proveedores WHERE ID = ".$id)or die(mysqli_error($con));	
		
		$var = "Proveedor eliminado con exito";
		echo "
	    	<form id='form' action='../admin.php' method='post'>
	    		<input style='visibility: hidden;display: block;' type='text' name='prov' value='".$var."'>
	    	</form>
	    	<script>
	    		document.forms['form'].submit();
	    	</script>
		";
	//}
 	
 ?>