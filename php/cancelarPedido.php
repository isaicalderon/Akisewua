<?php 
	require 'conexion.php';
	require 'isLogin.php';
	require 'fecha.php';
	$id = $_GET['id'];

	// editamos el pedido 
	mysqli_query($con, "UPDATE pedidos SET status = 1 WHERE ID = ".$id);

	// insertamos en pedido finalizado
	mysqli_query($con, "INSERT INTO pedidos_fin (ID_Prod, Estado,Fecha) 
		VALUES('$id', 'Cancelado','$fechausuario') ") or die(mysqli_error($con));

	// Enviamos el mensaje al usuario
	$query = mysqli_query($con, "SELECT * FROM pedidos WHERE ID = ".$id) or die(mysqli_error($con));
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

	mysqli_query($con, "INSERT INTO mensajes(De, Para, ID_Pedido, Mensaje, Fecha)
		VALUES('".($_SESSION['id_user']+1000)."','".$row['ID_User']."', '$id','Lo sentimos, su pedido fue cancelado','$fechausuario') ") or die(mysqli_error($con));
	
	$var = "Cancelado aceptado";
	
	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='prod_pen' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";

	

 ?>