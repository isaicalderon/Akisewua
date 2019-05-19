<?php 
	require 'conexion.php';
	require 'fecha.php';
	require 'isLogin.php';

	//$id = $_POST['id'];
	$id_coti = $_POST['id_coti'];
	$id_user = $_POST['id_user'];


	mysqli_query($con, "UPDATE cotizaciones SET status = 1 WHERE ID = ".$id_coti)or die(mysqli_error($con));

	$idFinal = $_SESSION['id_user'] + 1000;
	$mensaje = 'Su cotización fue aceptada';
	mysqli_query($con, "INSERT INTO mensajes_coti(De, Para, ID_Coti, Mensaje, Fecha)
		VALUES('".$idFinal."','$id_user','$id_coti','$mensaje','$fechausuario') ")or die(mysqli_error($con));
	

	
	$var = "Cotizacion aceptada";
	echo "
    	<form id='form' action='../mensajes.php?id=".$id_coti."&nusr=".$id_user."' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='coti' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
	
 ?>