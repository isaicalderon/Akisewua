<?php 
	require 'conexion.php';
	require 'isLogin.php';

	$id = $_GET['id'];

	mysqli_query($con, "DELETE FROM cotizaciones WHERE ID = ".$id);

	$var = "Cotización eliminada!";
	
	if ($_SESSION['root'] == 1) {
		echo "
	    	<form id='form' action='../admin.php' method='post'>
	    		<input style='visibility: hidden;display: block;' type='text' name='coti' value='".$var."'>
	    	</form>
	    	<script>
	    		document.forms['form'].submit();
	    	</script>
		";
	}else{

		echo "
	    	<form id='form' action='../perfil.php' method='post'>
	    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
	    	</form>
	    	<script>
	    		document.forms['form'].submit();
	    	</script>
		";
	}

 ?>