
<?php

class ProductController{
    
    public $conn;
    
    public function getAll(){
        require_once 'config/connection.php';
        $this->conn =  connect();
        $query = $this->conn->query("select * from products");
        $data = $query->fetchall();
        require_once 'views/products/read.php';
    }

    public function delete($id){
        require_once 'config/connection.php';
        $this->conn =  connect();
        $query = $this->conn->query("delete from products where id = $id");
        $data = $query->fetchall();
        
        $this->getAll();
    }

    public function create($desc, $price){
        require_once BASE_URL.'config/connection.php';
        $this->conn =  connect();
        $query = $this->conn->query("insert into products(description, price) values('$desc', $price)");
        
        $this->getAll();
    }

    // public function update(){
    //     require_once 'config/connection.php';
    //     $this->conn =  connect();
    //     $query = $this->conn->query("select * from products");
    //     $data = $query->fetchall();
    //     require_once 'views/products/read.php';
    // }


}

?>