<?php 
include '../config/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$adicional = $_POST['adicional'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];

$sql = "update productos 
set prod_nombre='$nombre', prod_datos_adicionales='$adicional', prod_categoriaId='$categoria', prod_stock='$stock' 
where prod_id =$id";

$ejecutar = mysqli_query($conexion, $sql);

// mysqli_close($conexion);

echo $ejecutar;

?>