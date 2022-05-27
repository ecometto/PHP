<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "agenda";

//CONEXION POR PROCEDIMIENTO MYSQLI
$conexion = mysqli_connect($host, $user, $pass, $db);
if (!$conexion){
    echo "SE HA PRODUCIDO ALGUN ERROR EN LA CONEXION CON LA BASE DE DATOS";
} 

// $conexion1 = mysqli_connect($host, $user, $pass, "gestar");
// if (!$conexion){
//     echo "SE HA PRODUCIDO ALGUN ERROR EN LA CONEXION CON LA BASE DE DATOS";
// }

// $conexion2 = mysqli_connect($host, $user, $pass, "usuarios");
// if (!$conexion){
//     echo "SE HA PRODUCIDO ALGUN ERROR EN LA CONEXION CON LA BASE DE DATOS";
// }

// // CONEXION POR OBJETOS
// $conexion = new mysqli();
// $conexion->connect($host, $user, $pass, $db);
// if($conexion){
//     echo "conexion POO exitosa";
// }


