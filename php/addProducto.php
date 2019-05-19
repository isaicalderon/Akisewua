<?php 
	require 'conexion.php';
	require 'fecha.php';
	$desc = $_POST['desc'];
	$alto = $_POST['alto'];
	$categoria = $_POST['categorias'];
	
	/* edit */
	$id = $_POST['id'];
	$status = $_POST['status'];

	if(isset($_FILES['img']['tmp_name'])){
		# Comprobar si es una img por  el type
		if ($_FILES['img']['type']=='image/jpeg' || $_FILES['img']['type']=='image/jpg' || 
			 $_FILES['img']['type']=='image/png') {
			# Escapa caracteres especiales
			$imgfinal = mysqli_real_escape_string($con, file_get_contents($_FILES["img"]["tmp_name"]));
			$imgtype = $_FILES['img']['type'];
		}else{
			$boolerror = true;
		}
	}else{
		$imgfinal = mysqli_real_escape_string($con, file_get_contents("../img/productos/no-image.jpeg"));
		$imgtype = "image/jpeg";
    }

    
    if ($status!=1) {
    	mysqli_query($con, "INSERT INTO productos(Descripcion, type_img, img, alto, Categoria, Fecha_insert) VALUES('$desc', '$imgtype', '$imgfinal', '$alto', '$categoria','$fechausuario') ") or die("Error".mysqli_error($con));
		$var = "Producto agregado con exito";

	}else{
		mysqli_query($con, "UPDATE productos SET Descripcion = '".$desc."',
											   type_img = '".$imgtype."',
											   img = '".$imgfinal."',
											   Categoria = '".$categoria."',
											   alto= '".$alto."' WHERE ID = ".$id)or die("Error".mysqli_error($con));
		$var = "Producto editado con exito";
		
	}
	
	echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='prod' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
	
?>