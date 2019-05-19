<?php 
	require 'conexion.php';
	require 'fecha.php';
	$id_pedido = $_POST['id_prod'];
	$id_user = $_POST['id_user'];
	$descripcion = $_POST['desc'];


	mysqli_query($con, "INSERT INTO pedidos(ID_Prod, ID_User, Descripcion, Fecha, status)
		VALUES('$id_pedido', '$id_user', '$descripcion', '$fechausuario','0') ")or die(mysqli_error($con));
	
	$lastId = mysqli_insert_id($con);

	$query = mysqli_query($con, "SELECT * FROM populares WHERE ID_Prod = ".$id_pedido)or die(mysqli_error($con));
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

	if ($row['ID'] > 0) {
		// update
		//echo "entro al update id_pop: ".$row['ID'];
		$cont = $row['Contador'] + 1;
		mysqli_query($con, "UPDATE populares SET Contador = '".$cont."' WHERE ID = '".$row['ID']."'")or die(mysqli_error($con));
	}else{
		//insert
		//echo "entro al insert id: ".$row['ID'];;
		mysqli_query($con, "INSERT INTO populares(ID_Pedido, ID_Prod, Contador) 
		VALUES ('$lastId','$id_pedido','1') ")or die(mysqli_error($con));
	}
	
	$var = "Pedido realizado con exito";
	echo "
    	<form id='form' action='../perfil.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
	
	
 ?>