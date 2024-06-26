<?php
require_once 'models/Product.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    public function index() {
        $products = $this->model->getAll();
        require 'views/product/index.php';
    }

    public function show($id) {
        $product = $this->model->getById($id);
        require 'views/product/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->create($_POST);
            header('Location: /');
            exit();
        }
        require 'views/product/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($id, $_POST);
            header('Location: /');
            exit();
        }
        $product = $this->model->getById($id);
        require 'views/product/edit.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: /');
        exit();
    }
}
?>
