<?php 

class Conexion{

    public static function conectar(){
        $con = mysqli_connect('localhost','root','','prueba');
        return $con;
    }
}
?>