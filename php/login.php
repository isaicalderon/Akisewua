<?php 
	require 'conexion.php';
	require 'desencriptar.php';
	if (@$_GET['newEmail']!="") {
		$user = @$_GET['newEmail'];
		$pass = @$_GET['newPass'];
	}else{
		$user = $_POST["email"];
		$pass = $_POST["pass"];
	}

	$error1 = true;
	$error2 = true;

	$root = false;
	/* Consulta para root */
	$query = mysqli_query($con, "SELECT * FROM admin");
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		if ($row['User'] == $user) { // comparamos email
			$error1 = false;
			if ($row['Password'] == $pass) { // comparamos contraseña
				$root = true;
				@session_start();
				$_SESSION['id_user'] = $row["ID"];
				$_SESSION['root'] = 1;
				$_SESSION['name_user'] = $row["User"];
				$var = "Login admin";
				$error2 = false;
			}else{
				$var = "Contraseña incorrecta";
				$error2 = true;
			}
		}else{
			$error1 = true;
			$var = "El correo electronico digitado no existe";
		}
	}

	if (!$root) {
		/* Consula para user */
		$query = mysqli_query($con, "SELECT * FROM clientes");

		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			if ($row['Email'] == $user) {
				$error1 = false;
			}
		}

		if (!$error1) {
			$query = mysqli_query($con, "SELECT * FROM clientes WHERE Email = '$user' ");
			$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
			if (desencriptar($row["Password"]) == $pass) {
				$var = 'login correcto!';
				@session_start();
				$_SESSION['id_user'] = $row["ID"];
				$_SESSION['name_user'] = $row["Nombres"]." ".$row["Apellidos"];
				$_SESSION['root'] = 0;
				$error2 = false;
			}else{
				$var = 'Contraseña incorrecta';
			}
			
		}else{
			$var = "El correo electronico digitado no existe";
		}
	}
	
	if ($root) {
		echo "
	    	<form id='form' action='../admin.php' method='post'>
	    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
	    	</form>
	    	<script>
	    		document.forms['form'].submit();
	    	</script>
		";
	}else{
		//$var = "Sesión iniciada";
		if ($error1 == true || $error2 == true) {
			echo "
	    	<form id='form' action='../index.php' method='post'>
	    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
	    	</form>
	    	<script>
	    		document.forms['form'].submit();
	    	</script>
			";
		
		}else{
			echo "
	    	<form id='form' action='../perfil.php' method='post'>
	    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
	    	</form>
	    	<script>
	    		document.forms['form'].submit();
	    	</script>
			";
		}
		
	}
	
?>