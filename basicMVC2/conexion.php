<?php 
class Conexion{
    public static function Conectar(){
        $con = mysqli_connect('localhost','root','','prueba');
        return $con;
    }
}