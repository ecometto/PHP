<?php 

class Conexion{
    public $db;

    public function conectar()
    {
        $this->db = mysqli_connect('localhost','root','','prueba');
        return $this->db;
    }
}
?>