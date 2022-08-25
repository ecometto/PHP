<?php

// validando logueo 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: ./login.php');
}


// MAQUETADO DE INDEX.PHP
// ENCABEZADO y SIDEBAR
require 'view/include/header.php';
require 'view/include/side_menu.php';



// CONTROLADOR DINAMICO 
 
if (isset($_POST['guardar'])){
    echo "<script>alert($_POST[titulo])</script>";
}


if (isset($_GET['action'])) {

    if ($_GET['action'] === "index") {
        include 'model/model.php';
        $ticket = new Tickets();
        $tickets = $ticket->get_tickets($_GET['id']);

        include "view/view_index.php";

    } else if ($_GET['action'] === "nuevo") {

        include "view/view_nuevo.php";

    } elseif($_GET['action'] === "cargado") {
        
        include "view/view_index.php";

    }


} else{
    echo "ud se encuentra en un sitio sin autorización. <br>
            Regrese a login desde <a href='login.php'>AQUI</a>";
}


// PIE DE PAGINA 
require 'view/include/footer.php';
