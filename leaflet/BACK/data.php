<?php 
// $con = mysqli_connect('localhost','root','','mapa');

include '../conexion.php';
$sql = "select * from ubicaciones";
$query = mysqli_query($con, $sql);
$data= [];
while($cada = mysqli_fetch_array($query,MYSQLI_ASSOC)){
    // array_push($data, $cada)
    $data[]=$cada;
}
$dataJson= json_encode($data);
echo $dataJson;
?>