<?php 
	require 'conexion.php';
	require 'fecha.php';
	$desc = $_POST['desc'];
	$alto = $_POST['alto'];
	$categoria = $_POST['categorias'];
	$precio = $_POST['precio'];
	$stock = $_POST['stock'];
	$cod_prov = $_POST['proveedor'];
	/* edit */
	$id = $_POST['id'];
	$status = $_POST['status'];

	$img_url = "img/productos/aki/";

	if(isset($_FILES['img']['tmp_name'])){
		# Comprobar si es una img por  el type
		if ($_FILES['img']['type']=='image/jpeg' || $_FILES['img']['type']=='image/jpg' || 
			 $_FILES['img']['type']=='image/png') {
			# Escapa caracteres especiales
			//$imgfinal = mysqli_real_escape_string($con, file_get_contents($_FILES["img"]["tmp_name"]));
			//$imgtype = $_FILES['img']['type'];
			$img_url .= $_FILES['img']['name'];
			
		}else{
			$boolerror = true;
		}
	}else{
		//$imgfinal = mysqli_real_escape_string($con, file_get_contents("../img/productos/no-image.jpeg"));
		//$imgtype = "image/jpeg";
		$img_url .= "no-image.jpeg";
	}
	
	//echo $img_url;

    
    if ($status!=1) {
    	mysqli_query($con, "INSERT INTO productos(Descripcion, precio, stock, url_img, alto, Categoria,cod_prov, Fecha_insert) 
			VALUES('$desc', '$precio', '$stock', '$img_url', '$alto', '$categoria', '$cod_prov','$fechausuario') ") or die("Error".mysqli_error($con));
		$var = "Producto agregado con exito";

	}else{
		mysqli_query($con, "UPDATE productos SET Descripcion = '".$desc."',
											   Categoria = '".$categoria."',
											   precio = '".$precio."',
											   stock = '".$stock."',
											   url_img = '".$img_url."',
											   cod_prov = '".$cod_prov."',
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