<?php 
	require 'conexion.php';
	$email = $_POST['email'];
	$desc = $_POST['desc'];

	mysqli_query($con, "INSERT INTO contacto (Descripcion, Email) VALUES('$desc','$email')");

	header("Location: ../index.php");

 ?>