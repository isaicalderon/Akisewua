<?php
	require_once ('conexion.php');
	# Obtenemos el id de la publicacion
	$id = $_GET['id'];

	$C = mysqli_query($con, "SELECT * FROM mensajes_coti WHERE ID = '$id' ");
	$R = mysqli_fetch_array($C, MYSQLI_ASSOC);
	header("Content-type:".$R["type_img"] );
	echo $R['Img'];	
?>