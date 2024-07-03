

<?php

require_once 'models/ProductModel.php';

class ProductController{
    
    public $model;

    public function __construct(){
        $this->model = new ProductModel();
    }

    public function index(){
        $data = $this->model->getAll();
        require_once 'views/products/index.php';
    }

    public function details($id){
        $data = $this->model->getOne($id);
        require_once 'views/products/detail.php';
    }
    
    public function edit($id){
        $data = $this->model->getOne($id);
        require_once 'views/products/edit.php';
    }

    public function delete($id){
        $data = $this->model->delete($id);
        $this->index();
    }

    public function create(){
        require_once 'views/products/create.php';
    }

    public function addingNew($name, $desc, $price){
        $this->model->addingNew($name, $desc, $price);
        header ('location: index.php');
        exit();
    }

    public function updating($id, $n, $d, $p){
        $this->model->updating($id, $n, $d, $p);
        header('location: index.php');
    }
}

?>