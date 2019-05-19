<?php 
	require 'conexion.php';

	$id = $_GET['id'];

	// eliminamos el finalizado
	mysqli_query($con, "DELETE FROM pedidos_fin WHERE ID = ".$id);

	$var = "Pedido eliminado!";

	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='prod_fin' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";


 ?>