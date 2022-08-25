<?php 


class User{
    public static function login($mail, $pass){
        include_once 'config/conexion.php';
        $con = Conexion::conectar();
        $query = "select * from users where mail = '$mail' and pass = '$pass'";
        $ejecutar = mysqli_query($con, $query);
        $validado = mysqli_num_rows($ejecutar);
        
        if($validado === 1){
            $data = mysqli_fetch_array($ejecutar);
            return  $data;
        } else{
            header('Location: login.php?m=noValido');
        }


    }
}


?>