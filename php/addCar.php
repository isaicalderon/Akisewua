<?php 
	require 'conexion.php';
    require 'isLogin.php';
    if (!$status) {
        $var = "Lo sentimos, debes iniciar sesion antes de hacer un pedido!";
        echo "
            <form id='form' action='../productos.php' method='post'>
                <input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
            </form>
            <script>
                document.forms['form'].submit();
            </script>
        ";
    }
    $id_prod = $_POST['id_prod'];
    
    $query = "INSERT INTO carro (ID_User, ID_Prod) VALUES('".$_SESSION['id_user']."', '$id_prod')";

    mysqli_query($con, $query);
    $var = "Se ha agregado el producto a su lista de cotización";
	echo "
    	<form id='form' action='../productos.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
	

 ?>