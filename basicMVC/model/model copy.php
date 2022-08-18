<?php

use Productos as GlobalProductos;

class Productos
{

    public function GetProducts()
    {
        include 'conexion copy.php';
        $con = new Conexion();
        $conect = $con->conectar();

        $query = 'select * from productos';

        $ejec = mysqli_query($conect, $query);

        $data = mysqli_fetch_all($ejec);

        return $data;
    }
}


