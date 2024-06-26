
<?php

class ProductModel{
    public $conn;

    public function getData(){
        $this->conn = new PDO("mysql:host=localhost;dbname=pruebas_mvc","root","");
        $query = $this->conn->query("select * from products");
        $data = $query->fetchAll();
        return $data;
    }

    public function addData($description, $price){
        $this->conn = new PDO("mysql:host=localhost;dbname=pruebas_mvc","root","");
        $query = $this->conn->query("Insert into products(description, price) values('$description', $price )");
        $added = $query->fetchAll();
        return $added;
    }

}



?>