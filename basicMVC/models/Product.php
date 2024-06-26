
<?php
require_once 'config/database.php';

class Product {
    private $db;

    //genera conexion con DDBB
    public function __construct() {
        $this->db = getDbConnection();
    }

    
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['description'], $data['price']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['description'], $data['price'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
