<?php 
	require 'conexion.php';
	@session_start();
	$status = false;
	if (isset($_SESSION['id_user'])) {
		$status = true;
	}
 ?>