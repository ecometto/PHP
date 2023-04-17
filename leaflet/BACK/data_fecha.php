<?php 
$fecha = $_GET['fecha'];
include '../conexion.php';
$data=[];
$sql=" SELECT * FROM ubicaciones WHERE date(fecha) = '$fecha' ";
$query= mysqli_query($con, $sql);
while($fila = mysqli_fetch_array($query, MYSQLI_ASSOC)){
    $data[] = $fila;
}
$dataJson = json_encode($data);
echo $dataJson;
