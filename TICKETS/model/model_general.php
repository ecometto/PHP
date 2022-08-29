<?php 

include 'config/conexion.php';

class General{

    public static function get_areas(){

        $con = Conexion::Conectar();
        $query = 'select * from areas';
        $ejecutar = mysqli_query($con, $query);
        $areas = mysqli_fetch_all($ejecutar);

        return $areas;

    }
}



?>