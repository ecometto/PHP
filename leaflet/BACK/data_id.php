<?php 

include '../conexion.php';
$id = $_GET['id'];
$sql = "select * from ubicaciones where id_mov = $id";
$data=[];
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
$jsonData = json_encode($data);
echo $jsonData ;


?>