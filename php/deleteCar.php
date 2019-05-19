<?php 
	require 'conexion.php';
	require 'isLogin.php';

	$id = $_GET['id'];
	
	mysqli_query($con, "DELETE FROM carro WHERE ID = ".$id);

	$var = "Producto eliminado de la lista";

	echo "
    	<form id='form' action='../cotizaciones.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
	
 ?>