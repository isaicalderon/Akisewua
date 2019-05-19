<?
require 'php/conexion.php';

$exit = "";
$query = "SELECT * FROM productos";

if(isset($_POST['consult']))
{
    $q = $mysqli->real_escape_string($_POST['consult']);
    $query = "SELECT Descripcion FROM productos WHERE Descripcion LIKE '%".$q."%'";
}

$result = $mysqli->query($query);
if($result->num_rows > 0)
{
    $exit.="<div class='col-md-4'>
                    <div class='card mb-4 box-shadow'>
                        <img class='card-img-top'  data-holder-rendered='true' style=width: 100%; display: block;'>
                            <div class='card-body'>
                                <p class='card-text'></p>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <form action='pedido.php' method='POST'>
                                                <button type='submit' class='btn btn-sm btn-outline-secondary'>Pedir</button>
                                                    <input name='id_prod' style='visibility:hidden;display:none'>
                                                        
                                                    <input name='name_img' style='visibility:hidden;display:none'>
                                                        
                                                    <button type='button' class='btn btn-sm btn-outline-secondary'> ❤ Wish</button>
                                            </form>
                                        </div>
                                            <small class='text-muted'>0 ❤ </small>
                                        </div>
                                    </div>
                                </div>
                           </div><tbody>";

    while($row = $result->fetch_assoc()){
        $exit.="<div class='col-md-4'>
                    <div class='card mb-4 box-shadow'>
                        <img class='card-img-top' src='php/getImg.php?ID=".$row['ID']."' data-holder-rendered='true' style='height:".$row['alto']."px; width: 100%; display: block;'>
                            <div class='card-body'>
                                <p class='card-text'>".$row['Descripcion']."</p>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <form action='pedido.php' method='POST'>
                                                <button type='submit' class='btn btn-sm btn-outline-secondary'>Pedir</button>
                                                    <input name='id_prod' value='".$row['ID']."' style='visibility:hidden;display:none'>
                                                        
                                                    <input name='name_img' value='".$row['type_img']."' style='visibility:hidden;display:none'>
                                                        
                                                    <button type='button' class='btn btn-sm btn-outline-secondary'> ❤ Wish</button>
                                            </form>
                                        </div>
                                            <small class='text-muted'>0 ❤ </small>
                                        </div>
                                    </div>
                                </div>
                           </div>";
    }

    $salida.="</tbody</div>";
}
else
{
    $exit.="No hay coincidencia";
}

echo $exit;

$mysqli->close();

?>