<?php 
$gestor = "mysql";
$host = "localhost";
$dbname = "yt_colores";
$user = "root";
$pass = "";

try{
    $con = new PDO("$gestor:host=$host;dbname=$dbname","$user","");
    // echo "conectado";
} catch (PDOException $e){
    echo "Error .." .$e->getMessage();
}