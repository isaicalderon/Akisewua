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

    $res = mysqli_query($con, "SELECT * FROM carro WHERE ID_User = ".$_SESSION['id_user']." AND ID_Prod = '$id_prod' ");

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    
    $cantidad = 0;

    if ($row['ID'] > 0){
        $cantidad = $row['cantidad'] + 1;
        $query = "UPDATE carro SET cantidad = ".$cantidad." WHERE ID = ".$row['ID'];
        mysqli_query($con, $query) or die(mysqli_error($con)) ;
        $var = "Se ha sumado el producto a su lista de Carro";   
    }else{
        $cantidad = 1;
        $query = "INSERT INTO carro (ID_User, ID_Prod, cantidad) VALUES('".$_SESSION['id_user']."', '$id_prod', '$cantidad')";
        mysqli_query($con, $query);
        $var = "Se ha agregado el producto a su lista de Carro";
    }

	echo "
    	<form id='form' action='../productos.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='mensaje' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
    ";
    
 ?>