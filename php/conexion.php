<?php 

	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "akisewadb_v06");
	if (!$con) {
		die("Error al conectar: ");
	}

 ?>