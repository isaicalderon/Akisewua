<?php 
	require 'conexion.php';
	require 'isLogin.php';
	require 'fecha.php';

	$cont 		= $_POST['cont'];
	$subt 		= $_POST['subt'];
	$total 		= $_POST['tTotal'];

	$envio 		= $_POST['opciones'];
	$pago 		= $_POST['pago'];

	// //$numberX = $_POST['numberX'];
	$cantidadArray = "";
	$idArray = "";
	$subTotalArray = "";
	//$numberArrat = "";

	for ($i = 0; $i < $cont; $i++) { 
		$tmp = $_POST['number'.($i+1)];
		//echo "cantidad: ".$tmp."<br> ";
		$cantidadArray .= $tmp.",";

		$tmp = $_POST['ID'.($i+1)];
		//echo "ID: ".$tmp."<br> ";
		$idArray .= $tmp.",";

		$tmp = $_POST['totalX'.($i+1)];
		//echo "totalX: ".$tmp."<br> ";
		$subTotalArray .= $tmp.",";


	}

	//echo $subTotalArray;
	$hoy = date("Y-m-d"); 

	$query = "INSERT INTO `pedidos`(`ID_Prod`, `ID_Cliente`, `cantidad_total`, `cantidad`, `subtotal`, `total`, `fecha`, `envio`, `pago`, `status`)
						VALUES (
							'$idArray',
							".$_SESSION['id_user'].",
							'$cont',
							'$cantidadArray',
							'$subTotalArray',
							'$total',
							'$hoy',
							'$envio',
							'$pago',
							0
						)";

	mysqli_query($con, $query);
	$last_id = mysqli_insert_id($con);

	$idArray = explode(",",$idArray);
	$cantidadArray = explode(",",$cantidadArray);

	// cambiando estado del stock
	for($i = 0; $i < $cont; $i++){

		$query = "SELECT * FROM productos WHERE ID = ".$idArray[$i];
		$res = mysqli_query($con, $query);
		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

		$salidas = $cantidadArray[$i];

		$stockAfter = $row['stock']; // stock antes de la resta

		$stockBefore = $stockAfter - $salidas; // stock despues de la resta

		$promedio = $row['saldo'] / $stockAfter; // calculamos el costo promedio

		$haber = $promedio * $salidas; // calculamos el haber

		$saldo = $row['saldo'] - $haber;

		//$newPromedio = $saldo / $stockBefore;

		mysqli_query($con, "UPDATE productos SET 
								salidas = '$salidas',
								stock = '$stockBefore',
								haber = '$haber',
								saldo = '$saldo',
								costo_promedio = '$promedio'
			 WHERE ID = ".$idArray[$i]);
		
		// //echo $row['stock']. " ";
		// $stock = $row['stock'];
		
		// $tmp = $stock - $cantidadArray[$i];

	}


	
	// eliminando del carro
	mysqli_query($con, "DELETE FROM carro WHERE ID_User = ".$_SESSION['id_user']);

	$var = "Pedido realizado con exito";
	echo "
    	<form id='form' action='../verpedido.php' method='post'>
			<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
			<input style='visibility: hidden;display: block;' type='text' name='id' value='".$last_id ."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
	
		

	//echo $idArray	 ;
	// echo "cont:".$cont." <br>";
	// echo "subt:".$subt." <br>";
	// echo "total:".$total." <br>";
	// echo "envio:".$envio." <br>";
	// echo "pago:".$pago." <br>";
	// //echo "numberX:".$numberX." <br>";
	

	// $id_pedido = $_POST['id_prod'];
	// $id_user = $_POST['id_user'];
	// $descripcion = $_POST['desc'];

		
	// mysqli_query($con, "INSERT INTO pedidos(ID_Prod, ID_User, Descripcion, Fecha, status)
	// 	VALUES('$id_pedido', '$id_user', '$descripcion', '$fechausuario','0') ")or die(mysqli_error($con));
	
	// $lastId = mysqli_insert_id($con);

	// $query = mysqli_query($con, "SELECT * FROM populares WHERE ID_Prod = ".$id_pedido)or die(mysqli_error($con));
	// $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

	// if ($row['ID'] > 0) {
	// 	// update
	// 	//echo "entro al update id_pop: ".$row['ID'];
	// 	$cont = $row['Contador'] + 1;
	// 	mysqli_query($con, "UPDATE populares SET Contador = '".$cont."' WHERE ID = '".$row['ID']."'")or die(mysqli_error($con));
	// }else{
	// 	//insert
	// 	//echo "entro al insert id: ".$row['ID'];;
	// 	mysqli_query($con, "INSERT INTO populares(ID_Pedido, ID_Prod, Contador) 
	// 	VALUES ('$lastId','$id_pedido','1') ")or die(mysqli_error($con));
	// }
	
	
 ?>

 