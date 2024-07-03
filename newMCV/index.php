

<?php

require_once "controllers/ProductController.php";

$controller = new ProductController();

if (isset($_GET['action'])) {
    if ($_GET['action'] == "details") {
        $controller->details($_GET['id']);
    }
    if ($_GET['action'] == "edit") {
        $controller->edit($_GET['id']);
    }
    if ($_GET['action'] == "delete") {
        $controller->delete($_GET['id']);
    }
    if ($_GET['action'] == "create") {
        $controller->create();
    }
} else {
    $controller = new ProductController();
    $controller->index();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $controller->addingNew($_POST['name'], $_POST['description'], $_POST['price'],);
    }
    if (isset($_POST['update'])){
        $controller->updating($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'],);
    }
}
?>


