

<?php

class Model_products{
    private $conn;

    public function __construct(){
        require_once 'config/db.php';
        $this->conn = Connect();
    }

    public function getAll(){
        $sql = "select * from products";
        $query = $this->conn->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getOne($id){
        $sql = "select * from products where id = $id";
        $query = $this->conn->query($sql);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

}




?>