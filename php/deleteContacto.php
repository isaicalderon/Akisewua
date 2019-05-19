<?php 
	require 'conexion.php';

	$id = $_GET['id'];

	mysqli_query($con, "DELETE FROM contacto WHERE ID = ".$id);
	
	$var = "Borrado con exito";
	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
 ?>