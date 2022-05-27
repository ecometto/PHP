<?php 
include '../config/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$adicional = $_POST['adicionales'];


$sql = "update depositos 
set dep_descripcion='$nombre', dep_detalles='$adicional'  where dep_id =$id";

$ejecutar = mysqli_query($conexion, $sql);

// mysqli_close($conexion);

echo $ejecutar;

?>