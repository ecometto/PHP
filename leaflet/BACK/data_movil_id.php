<?php 
include '../conexion.php';

$movil_id = $_GET['movil'];

$data = [];
$sql="select * from ubicaciones where id_vehiculo = '$movil_id'";
$query = mysqli_query($con, $sql);
while($fila = mysqli_fetch_array($query, MYSQLI_ASSOC)){
    $data[] = $fila;
}
$Json_data = json_encode($data);

echo $Json_data;
