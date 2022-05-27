<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "curso";

//CONEXION POR PROCEDIMIENTO MYSQLI
$conexion = mysqli_connect($host, $user, $pass, $db);
if ($conexion){
    echo "conexion exitosa";
}

// // CONEXION POR OBJETOS
// $conexion = new mysqli();
// $conexion->connect($host, $user, $pass, $db);
// if($conexion){
//     echo "conexion POO exitosa";
// }

?>
