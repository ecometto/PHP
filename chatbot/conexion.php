<?php 
include './config.php';

class Conexion{   
    public static function conectar(){
        $conex = mysqli_connect(HOST, USER, PASS, DDBB);
        
        if (!$conex){
            echo mysqli_connect_errno();
        }
        return $conex;
    }
}



?>