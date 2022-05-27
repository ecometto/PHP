<?php 
include './../../conexion.php';
$prod_id = $_POST['producto'];

$sql = "call buscarUmedida($prod_id)";
$ejecutar = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_array($ejecutar);
echo $fila[2];

?>

