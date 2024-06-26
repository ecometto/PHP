<?php
require_once 'controllers/ProductController.php';

$controller = new ProductController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'show':
            $controller->show($_GET['id']);
            break;
        case 'create':
            $controller->create();
            break;
        case 'edit':
            $controller->edit($_GET['id']);
            break;
        case 'delete':
            $controller->delete($_GET['id']);
            break;
        default:
            $controller->index();
    }
} else {
    $controller->index();
}
?>
