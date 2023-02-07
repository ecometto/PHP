<?php 

include './conexion.php';
$con=conectar();
$id=$_GET['id'];

$sql="delete from contacts where id = $id";
$query=mysqli_query($con, $sql);

header('Location: index.php');

?>