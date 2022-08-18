<?php 

include './model/model.php';


$datos = Productos:: getProductos();


include './view/view.php';



?>