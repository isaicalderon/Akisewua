<meta charset="utf-8">
<?php 
	require 'conexion.php';
	require 'isLogin.php';
	require 'fecha.php';

	$id_coti = $_POST['id_coti'];
	$id_de = $_SESSION['id_user'];
	$para = $_POST['id_user'];
	$id_user = $_POST['idusertmp'];
	$mensaje = $_POST['mensaje'];
	if ($_SESSION['root'] == 1) {
		$id_de+=1000; // id de administrador
	}else{
		$para = 1001; // id del administrador
	}

	$query = "INSERT INTO mensajes_coti(De, Para, ID_Coti, Mensaje, Fecha) VALUES ('$id_de','$para','$id_coti','$mensaje','$fechausuario')";

	if(isset($_FILES['img']['tmp_name'])){
		# Comprobar si es una img por  el type
		if ($_FILES['img']['type']=='image/jpeg' || $_FILES['img']['type']=='image/jpg' || 
			 $_FILES['img']['type']=='image/png') {
			# Escapa caracteres especiales
			$imgfinal = mysqli_real_escape_string($con, file_get_contents($_FILES["img"]["tmp_name"]));
			$imgtype = $_FILES['img']['type'];
			$imgName = $_FILES['img']['name'];
			$query = "INSERT INTO mensajes_coti(De, Para, ID_Coti, Mensaje, Img, Name_img, type_img, Fecha) VALUES ('$id_de','$para','$id_coti','$mensaje', '$imgfinal','$imgName','$imgtype','$fechausuario')";
		}else{
			$boolerror = true;
		}
	}
	mysqli_query($con, $query) or die(mysqli_error($con));
	
	$var = "Mensaje enviado!";

	echo "
    	<form id='form' action='../mensajes.php?id=".$id_coti."&nusr=".$id_user." ' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
	
 ?>