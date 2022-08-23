<?php 
include_once 'conexion.php';

class Articulos {

    public function get_products(){
        $data = [];
        $con = Conexion::conectar();
        $query = "select * from productos";

        $ejec = mysqli_query($con, $query);
        $data = mysqli_fetch_all($ejec);

        return $data;
    }

    public function insert_products($mail, $pass){
        $con = Conexion::conectar();
        $query = "insert into productos values ('null','$mail', '$pass')";

        $ejec = mysqli_query($con, $query);

        return $ejec;

    }

}
