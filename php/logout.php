<?php 
	require 'isLogin.php';
	@session_destroy();
	$status = false;
	header("Location: ../index.php");
 ?>