<?php 


class Productos{

    public static function getProductos(){
        include './model/conexion.php';
        $con = Conexion::conectar();
        $query = 'select * from productos';

        $data = mysqli_query($con, $query);
        $res = mysqli_fetch_all($data);

        return $res;

    }
}

?>