<?php 

// validando logueo 
session_start();
if (!isset($_SESSION['mail'])){
    header('location: ./login.php');
}

// MAQUETADO DE INDEX.PHP
require 'view/include/header.php';

include_once 'controller/controller.php';

require 'view/include/footer.php';

?>

