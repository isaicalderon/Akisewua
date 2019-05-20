<?php  
    require '../conexion.php';

    $email = $_GET['email'];
    $found = false;
    
    $query = "SELECT * FROM clientes";

    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        if($row['Email'] == $email){
            $found = true;
        }
    }

    if ($found){
        echo 400;
    }else{
        echo 200;
    }


?>