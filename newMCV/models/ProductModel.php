<?php


require_once 'config/Connect.php';


class ProductModel{
    
    public $conn;

    public function __construct() {        
        $obj = new Connect();
        $this->conn = $obj->getConnection();
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
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function delete($id){
        $sql = "delete from products where id = $id";
        $this->conn->query($sql);
    }

    public function addingNew($name, $desc, $price){
        $sql = "insert into products (name, description, price) 
                                    values('$name', '$desc', $price)";
        $this->conn->query($sql);
    }

    public function updating($id, $n, $d, $p){
        $sql = "update products set name='$n', description='$d', price='$p' where id = $id";
        $this->conn->query($sql);
    }
}


?>