<?php 
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];

if($edad>18){
echo "Bienvenido Sr. $apellido, $nombre. Con su edad de $edad puede ingresar";
}else{
    echo "Lo sentimos. Ud es menor de edad y no puede ingresar";
}
// $con = mysqli_connect('localhost','root','','tienda');
// $query = "insert into clientes values (null,'$apellido','$nombre',$edad ,current_timestamp)";
// $ejecutar = mysqli_query($con, $query);
// if($ejecutar){

//     echo "El cliente $nombre $apellido fue ingresado correctamente";

// }



.



