<?php 
	
	require 'conexion.php';
	require 'isLogin.php';

	$id = $_GET['id'];
	$errorFatal = false;

	$query = mysqli_query($con, "SELECT * FROM pedidos_proceso pp, cotizaciones coti WHERE pp.ID_Coti = coti.ID AND coti.ID_User =  ".$id)or die(mysqli_error($con));
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){

		if ($row['status'] == 0) {
			$errorFatal = true;
		}
	
	}


	if (!$errorFatal) {
		// borrando de clientes
		mysqli_query($con, "DELETE FROM clientes WHERE ID = ".$id)or die(mysqli_error($con));
		// borrando de Carro
		mysqli_query($con, "DELETE FROM carro WHERE ID_User = ".$id)or die(mysqli_error($con));
		// borrando cotizaciones
		mysqli_query($con, "DELETE FROM cotizaciones WHERE ID_User = ".$id)or die(mysqli_error($con));
		
		$var = "Usuario borrado correctamente!";

	}else{
		$var = "Ups! No se pudo borrar, actualmente se cuenta con un pedido en proceso<br>Si desea borrar esta cuenta finalice el pedido primero";
	}
	
	if ($_SESSION['root'] == 1) {
		
		echo "
	    	<form id='form' action='../admin.php?vc=1' method='post'>
	    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
	    	</form>
	    	<script>
	    		document.forms['form'].submit();
	    	</script>
		";
		
	}else{
		if (!$errorFatal) {
			require 'logout.php';
			echo "
		    	<form id='form' action='../index.php' method='post'>
		    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
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
		
	}
	

 ?>