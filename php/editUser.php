<?php 
	include 'conexion.php';
	include 'isLogin.php';
	include 'encriptar.php';
	$id = $_POST['id_user'];
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

	$query = "UPDATE clientes SET Nombres = '$nombres',
								Apellidos = '$apellidos',
								Password = '$pass2',
								Direccion = '$dir1',
								Telefonos = '$tel',
								Pais = '".utf8_decode($pais)."',
								Estado = '$estado',
								Zip = '$zip' WHERE ID = ".$id;
	mysqli_query($con, $query);

	$var = "Datos cambiados";

	if ($_SESSION['root'] == 1) {
		echo "
	    	<form id='form' action='../admin.php' method='post'>
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
	    	alert('redireccionando al perfil');
	    		document.forms['form'].submit();
	    	</script>
		";
	}
	



 ?>