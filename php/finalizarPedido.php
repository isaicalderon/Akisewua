<?php 
	require 'conexion.php';
	require 'isLogin.php';
	require 'fecha.php';

	$id_pedido = $_GET['id'];
	
	// eliminamos de la tabla Pedidos_proceso
	mysqli_query($con, "UPDATE pedidos_proceso SET status = 1, 
		Fecha_final = '$fechausuario' WHERE ID = ".$id_pedido)or die(mysqli_error($con));

	//insertamos en la tabla Pedidos_fin
	/*
	mysqli_query($con, "INSERT INTO Pedidos_fin(ID_Pedido, Estado, Fecha)
		VALUES ('$id_pedido','Finalizado','$fechausuario') ") or die(mysqli_error($con));
	*/
	$var = "Pedido finalizado!";
	
	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='prod_fin' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";


 ?>