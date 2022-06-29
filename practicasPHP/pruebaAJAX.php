<?php 

$con = mysqli_connect('localhost','root','','prueba');

$where = "where 1 = 1";


$SelectAll = "select * from prueba $where";
$ejecutar = mysqli_query($con, $SelectAll);
$data = mysqli_fetch_all($ejecutar, MYSQLI_BOTH);

echo json_encode($data);
mysqli_close($con)
?>