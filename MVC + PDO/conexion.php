<?php

$host='localhost';
$db= 'usuarios';
$user= 'root';
$pass = "";

// CONEXION CON MYSQLI Procedimental (HOSTNAME, USUARIO, PASSWORD, DATABASE NAME)
// $conexion = mysqli_connect($host, $user, '', $db);
// if ($conexion){
//     echo "conexion MYSQLI OK";
// } Else{
//     echo "PROBLEMAS DE CONEXION MYSQLI";
// }


// CONEXION CON  MYSQLI POObj. (HOSTNAME, USUARIO, PASSWORD, DATABASE NAME)
$conexion = new mysqli($host, $user, $pass, $db);
if($conexion->connect_errno){
    echo "fallo en la conexion";
}


// CONEXION CON PDO
// try {
//     $bdlink = new PDO('mysql:host=localhost; dbname=curso', 'root', '');
//     echo "conection ok <br>";
// } catch (exception $e) {
//     die('PROBLEMAS EN LAS CONEXION' . $e->getMessage());
// } finally {
//     echo "base de datos 'curso'";
// }

