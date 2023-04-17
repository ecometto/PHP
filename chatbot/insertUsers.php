<?php  

$con = mysqli_connect("localhost", "root", "", "bot");
$apellido = "Perez";
$nombre="Juan";
$dni = 33333333;
$direccion = "otraDireccion 33";

$sql = "insert into clientes values (null, '$apellido','$nombre',$dni, '$direccion')";
$run_query = mysqli_query($con, $sql);

echo "el ingreso fue : " .$run_query;

?>