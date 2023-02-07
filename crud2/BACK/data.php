<?php 
$con = mysqli_connect('localhost','root','','mapa');
$sql = "select * from ubicaciones";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_all($query, MYSQLI_BOTH)

?>