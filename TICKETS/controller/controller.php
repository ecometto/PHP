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

// if (isset($_POST['guardar'])){
//     echo "<script>alert($_POST[titulo])</script>";
// }

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'cargar') {
        $area = $_POST['area'];
        $titulo = $_POST['titulo'];
        $detalles = $_POST['detalles'];
        $user = $_SESSION['user_id'];


        
        include 'model/model.php';
        $res = Tickets::new_tickets($area, $titulo, $detalles, $user);

        echo "
    <script> 
        alert('registro $res ingresado correctamente');
        window.location.href= 'index.php?action=index&id=$_SESSION[user_id]';
    </script>
";
    }
    }



if (isset($_GET['action'])) {

    if ($_GET['action'] === "index") {
        include 'model/model.php';

        if($_SESSION['user_tipo']==="admin"){
            $condition = "where 1=1";
        } else{
            $condition = "where t.solicitante_id = $_SESSION[user_id]";
        };


        $ticket = new Tickets();
        $tickets = $ticket->get_tickets($condition);

        include "view/view_index.php";

    } else if ($_GET['action'] === "nuevo") {
        include "view/view_nuevo.php";

    } elseif ($_GET['action'] === "cargado") {
        include "view/view_index.php";

    } else if($_GET['action'] === 'cerrar'){
        $id = $_GET['id'];   
           include 'model/model.php';
           $res = Tickets::close_ticket($id);
        
           echo "   <script> 
                        alert('registro $res cerrado. \\nPara consultarlo ingrese a \"Todos los registros\" ');
                        window.location.href= 'index.php?action=index&id=$_SESSION[user_id]';
                    </script>";
           
       }
}



// PIE DE PAGINA 
require 'view/include/footer.php';
