<?php 
include '../config/conexion.php';


$nombre = $_POST['nombre'];
$adicional = $_POST['adicional'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];

$sql = "INSERT INTO productos values(NULL, '$nombre', '$adicional', $categoria, $stock, 'habilitado')";
$ejecutar = mysqli_query($conexion, $sql);


echo $ejecutar;

?>