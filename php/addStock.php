<?php
    require 'conexion.php';

    $id = $_GET['id'];
    $stock = $_GET['stock'];

    mysqli_query($con, "UPDATE productos SET stock = ".$stock." WHERE ID = ".$id) or die(mysqli_error($con));

    header("Location: ../admin.php?prod=1");

?>