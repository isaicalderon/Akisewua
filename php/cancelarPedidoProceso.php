<?php 
	require 'conexion.php';
	require 'isLogin.php';
	require 'fecha.php';
	
	$id_pedido = $_POST['id_pedido'];
	$mensaje = $_POST['mensaje'];
	$id_user = $_POST['id_user'];
	$id_coti = $_POST['id_coti'];
	$query1 = "UPDATE pedidos_proceso SET status = 2 WHERE ID = ".$id_pedido;
	$query2 = "INSERT INTO mensajes_coti(De, Para, ID_Coti, Mensaje, Fecha)
		VALUES('".($_SESSION['id_user']+1000)."','".$id_user."', '$id_coti','$mensaje','$fechausuario')";

	// eliminamos de la tabla Pedidos_proceso
	mysqli_query($con, $query1)or die(mysqli_error($con));


	mysqli_query($con, $query2) or die(mysqli_error($con));
	
	$var = "Pedido cancelado!";
	
	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='pedidos' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
 ?>