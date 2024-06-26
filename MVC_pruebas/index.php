<?php

include 'config/env.php';

if (!isset($_GET['action'])) {
    require_once 'controllers/controller.php';
    $obj = new ProductController();
    $data = $obj->getAll();

} else {
    $id=$_GET['id'];
    switch ($_GET['action']) {
        case 'delete':
            require_once 'controllers/controller.php';
            $obj = new ProductController();
            $data = $obj->delete($id);
            break;
        case 'create':
            require_once 'controllers/controller.php';
            $obj = new ProductController();
            $data = $obj->create($desc, $price);
            break;
        // case 'update':
        //     require_once 'controllers/controller.php';
        //     $obj = new ProductController();
        //     $data = $obj->update();
        //     break;
    }
}
