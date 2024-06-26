<?php

if (isset($_POST['action']) and $_POST['action']=="create"){

   require_once '../../controllers/controller.php';
   $obj = new ProductController();
   $query = $obj->create($_POST['description'], $_POST['price']);

   header("location: " .BASE_URL);
}


?>