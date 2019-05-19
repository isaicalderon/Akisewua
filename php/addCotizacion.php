<?php 
	require 'conexion.php';
	require 'fecha.php';
	require 'isLogin.php';

	$cantidad = $_POST['cont'];

	//echo "Existen ".$cantidad." coti para este user<br>";

	for ($i = 1; $i <= $cantidad; $i++) { 
		$value = $_POST['text'.$i];
		$prod = $_POST['prod'.$i];
		//echo $value.", ".$prod."<br>";

		$query = "INSERT INTO cotizaciones (ID_Prod, ID_User, Descripcion, Fecha, status) 
			VALUES ('$prod', '".$_SESSION['id_user']."', '$value','$fechausuario','0')";
		//echo $query."<br>";	
		mysqli_query($con, $query) or die(mysqli_error($con));

		$lastId = mysqli_insert_id($con);

		$query = mysqli_query($con, "SELECT * FROM populares WHERE ID_Prod = ".$prod)or die("Err1".mysqli_error($con));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

		if ($row['ID'] > 0) {
			// update
			//echo "entro al update id_pop: ".$row['ID'];
			$cont = $row['Contador'] + 1;
			mysqli_query($con, "UPDATE populares SET Contador = '".$cont."' WHERE ID = '".$row['ID']."'")or die("Err2".mysqli_error($con));
		}else{
			//insert
			//echo "entro al insert id: ".$row['ID'];;
			mysqli_query($con, "INSERT INTO populares(ID_Coti, ID_Prod, Contador) 
			VALUES ('$lastId','$prod','1') ")or die("Err3".mysqli_error($con));
		}
	}
	// eliminando del carro
	mysqli_query($con, "DELETE FROM carro WHERE ID_User = ".$_SESSION['id_user']);

	$var = "Cotizaciones enviadas!";
	echo "
    	<form id='form' action='../perfil.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
	

 ?>