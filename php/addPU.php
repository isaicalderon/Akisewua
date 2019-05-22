<?php
    require 'conexion.php';

    $id = $_GET['id'];
    $pu = $_GET['pu'];

    mysqli_query($con, "UPDATE productos SET precio = ".$pu." WHERE ID = ".$id) or die(mysqli_error($con));

    header("Location: ../admin.php?prod=1");
?>