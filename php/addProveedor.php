<?php
    require 'conexion.php';

    $id         = $_POST['id'];
    $nombre     = $_POST['nombres'];
    $direccion  = $_POST['direccion'];
    $telefono   = $_POST['telefono'];
    $empresa    = $_POST['empresa'];
    $email      = $_POST['email'];
    $cp         = $_POST['cp'];

    $status     = $_POST['status'];
    
    if ($status != "1"){
        mysqli_query($con, "INSERT INTO proveedores(Nombre, Direccion, Telefono, Empresa, Correo, CP)
            VALUES ('$nombre', '$direccion', '$telefono', '$empresa', '$email', '$cp') ") or die(mysqli_error($con));
        $var = "El proveedor se ha registrado con exito!";
    }else{
        mysqli_query($con, "UPDATE `proveedores` SET 
                                `Nombre`    = '$nombre',
                                `Direccion` = '$direccion',
                                `Telefono`  = '$telefono',
                                `Empresa`   = '$empresa',
                                `Correo`    = '$email',
                                `CP`        = '$cp' 
                            WHERE ID = ".$id) or die(mysqli_error($con));

        $var = "El proveedor se ha editado con exito!";
    } 
    
    echo "
    	<form id='form' action='../admin.php' method='post'>
    		<input style='visibility: hidden;display: block;' type='text' name='prov' value='".$var."'>
    	</form>
    	<script>
    		document.forms['form'].submit();
    	</script>
	";
    
?>