<?php  
include_once("../modelo/conexion.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from articulos where id = $id";
    $query = mysqli_query($con, $sql);
}

header('Location: index.php?seccion=articulos/altaArticulos');

?>