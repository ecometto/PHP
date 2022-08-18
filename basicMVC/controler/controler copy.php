<?php 

include './model/model copy.php';


$productos = new Productos();

$datos = $productos->GetProducts();


include './view/view copy.php';

?>