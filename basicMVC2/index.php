<?php 


// validando logueo 
session_start();
if (!isset($_SESSION['user'])){
    header('location: ./login.php');
} else{
    echo $_SESSION['user'];
    echo "  <form action='#' method='POST'>
                <button name='close'>Close Session</button>
            </form>";
}

if(isset($_POST['close'])){
    session_start();
    session_destroy();    
}



include_once 'controller.php';