<?php 
	require 'conexion.php';
	require 'isLogin.php';
	require 'fecha.php';

	$id_pedido = $_POST["id"];
	$id_user = $_POST["id_user"];
	
	$mensaje = $_POST['mensaje'];

	mysqli_query($con, "UPDATE pedidos SET status = 1 WHERE ID = ".$id_pedido);
	
	mysqli_query($con, "INSERT INTO pedidos_proceso(ID_Prod, ID_User, Fecha_aceptado) 
		VALUES('$id_pedido','$id_user', '$fechausuario') ") or die(mysqli_error($con));
	
	$query = mysqli_query($con, "SELECT * FROM pedidos WHERE ID = ".$id_pedido);
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

	$idFinal = $_SESSION['id_user'] + 1000;

	mysqli_query($con, "INSERT INTO mensajes(De, Para, ID_Pedido, Mensaje, Fecha)
		VALUES('".$idFinal."','".$row['ID_User']."','$id_pedido','$mensaje','$fechausuario') ");

	$var = "Pedido aceptado";
	
	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='pedidos' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";


 ?>