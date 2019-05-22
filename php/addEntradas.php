<?php

    require 'conexion.php';

    $id = $_GET['id'];
    //echo "<br>" ;

    $entrada = $_GET['entrada'];

    $res = mysqli_query($con, "SELECT * FROM productos WHERE ID = ".$id);

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    
    $stock = $row['stock'];

    $stock += $entrada; // guardamos las entradas

    $debe = $entrada * $row['precio']; // entrada * precio unitario

    $saldo = $row['saldo'] + $debe; // calculamos el saldo

    $promedio = $saldo / $stock; // calculamos costo promedio

    $query = "UPDATE productos SET 
                    entradas = '$entrada',
                    stock = '$stock',
                    debe = '$debe',
                    saldo = '$saldo',
                    costo_promedio = '$promedio'
                WHERE ID = '$id'
    ";

    mysqli_query($con, $query) or die("Error");

    header("Location: ../admin.php?prod=1");

?>