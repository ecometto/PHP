<?php 

<<<<<<< HEAD
$conexion = mysqli_connect('localhost','root','','tienda');

if($conexion){
    echo "conexion ok";
}


define("COD","AES-256-CBC");
define("KEY" , "ECOM");
DEFINE("OPTION", TRUE);
define("IV", "1234567895534567");

=======
$conexion = mysqli_connect("localhost","root","","tienda");

if($conexion){
    echo "conexion correcta";
} else{
    echo "errores en la conexion";
}

>>>>>>> 838c3cd99489c4b2534aed2cae8408a1dfa0c790
?>