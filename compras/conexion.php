<?php 

$conexion = mysqli_connect('localhost','root','','compras');

if(!$conexion){
    echo " ATENCION: PROBLEMAS DE CONEXION A LA BASE DE DATOS";
}
?>