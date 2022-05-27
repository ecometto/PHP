<?php 
session_start();
if(!isset($_SESSION['mail'])){
    header("location: ../index.php");
}

include '../config/conexion.php';

?>


<?php require "../include/head.php"; ?>
<?php require "../include/header.php"; ?>

<body>
    


<?php 
if(isset($_GET['action'])){
    if($_GET['action'] == "index"){
        echo"
        
        ";
    }

    // direcciona a la pagina que se seleccionó en el link (enviada por get )
    $destino =  $_GET['action'];
        include './vistas/' .$destino . '.php';

}
?>


<?php include '../include/footer.php';?>
<?php include '../include/scripts.php';?>

</body>
</html>