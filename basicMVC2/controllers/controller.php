<?php 

class Controller_products{

    public function getAll(){
        require_once 'models/model.php';
        
        $obj = new Model_products();
        $data = $obj->getAll();

        require "views/index.php";
    }

    public function getOne($id){
        require_once 'models/model.php';
        $obj = new Model_products();
        $data = $obj->getOne($id);

        require 'views/showOne.php';

    }

}



?>