<?php 

	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "akisewadb_v07");
	if (!$con) {
		die("Error al conectar: ");
	}

 ?>