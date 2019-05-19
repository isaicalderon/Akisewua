<meta charset="utf-8">

<?php 
	include 'conexion.php';
	include 'encriptar.php';

	$nombres = $_POST['firstName'];
	$apellidos = $_POST['lastName'];
	$email = $_POST['email'];
	$pass = $_POST['pass1'];
	$dir1 = $_POST['dir1'];
	$tel = $_POST['tel'];
	$pais = $_POST['pais'];
	$estado = $_POST['estado'];
	$zip = $_POST['zip'];
	$pass2 = encriptar($pass);
	
	mysqli_query($con, "INSERT INTO clientes (Nombres, Apellidos, Email, Password, Direccion, Telefonos, 
		Pais, Estado, Zip, root) VALUES ('$nombres','$apellidos', '$email', '$pass2', '$dir1'
		,'$tel', '".utf8_decode($pais)."', '$estado', '$zip', '0') ")or die("Error ".mysqli_error($con));
 	
 	//header("Location: login.php?newEmail=".$email."&newPass=".$pass);

 	
 	$var = "Usuario registrado correctamente";
 	
 	echo "
	    	<form id='form' action='login.php?newEmail=".$email."&newPass=".$pass."' method='post'>
	    		<input style='visibility: hidden;display: block;' type='text' name='msj' value='".$var."'>
	    	</form>
	    	<script>
	    		document.forms['form'].submit();
	    	</script>
		";
 ?>