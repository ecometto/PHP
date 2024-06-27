

<?php 

class Products_model{
    
    private $connection;

    public function __construct()
    {
        require_once 'config/db.php';
        $this->connection = Connect();
    }

    public function getAllData(){
        $sql = "select * from products";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }



}

?>