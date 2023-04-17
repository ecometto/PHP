<?php 


class Conexion{   
    public static function conectar(){
        $conex = mysqli_connect("localhsot","root", "","bot");
        
        if ($conex){
            echo "conexion exitosa";
        }
        else{
            echo mysqli_connect_errno();
        }
    }
}



?>