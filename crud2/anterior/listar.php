<?php  
include './conexion.php';

$con=conectar();
$sql="select * from contacts";

$query = mysqli_query($con, $sql);
// $row= mysqli_fetch_array($query);
$res = mysqli_fetch_all($query, MYSQLI_BOTH);

