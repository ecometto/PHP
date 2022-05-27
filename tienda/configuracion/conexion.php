<?php 

$conexion = mysqli_connect("localhost","root","","tienda");

if($conexion){
    echo "conexion correcta";
} else{
    echo "errores en la conexion";
}

?>