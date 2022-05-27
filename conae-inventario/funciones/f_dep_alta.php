<?php 
include '../config/conexion.php';

$nombre = $_POST['nombre'];
$adicional = $_POST['adicionales'];

$sql = "INSERT INTO depositos values(NULL, '$nombre', '$adicional')";
$ejecutar = mysqli_query($conexion, $sql);

echo $ejecutar;

?>