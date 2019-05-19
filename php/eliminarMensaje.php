<?php 
	require 'conexion.php';

	$id = $_GET['id'];

	// eliminamos el finalizado
	mysqli_query($con, "DELETE FROM mensajes_coti WHERE ID = ".$id) or die(mysqli_error($con));

	$var = "Mensaje eliminado!";

	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='mensajes' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";


 ?>