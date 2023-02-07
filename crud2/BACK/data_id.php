<?php 
$con = mysqli_connect('localhost','root','','mapa');
$id = $_GET['id'];
$sql = "select * from ubicaciones where id_mov = $id";
$query = mysqli_query($con, $sql);
$data_id = mysqli_fetch_all($query, MYSQLI_BOTH);

echo json_encode($data_id);


?>