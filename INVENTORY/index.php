<?php 

include ('modelo/conexion.php');
session_start();
if(!isset($_SESSION['user'])){
    header('Location: login.php');
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="static/styles.css">
    <title>Document</title>
</head>

<body>
    <!-- HEADER  -->
    <?php include('includes/header.php') ?>


    <!-- CONTENT  -->
    <div class="container">
        <?php
        if (isset($_GET['seccion'])) {
            $vista = $_GET['seccion'];
            if (file_exists("vistas/$vista.php")) {
                include("vistas/$vista.php");
            } else {
                echo "El fichero NO existe. Ud ha sido redireccionado al HOME...";
                include("vistas/home.php");
                echo "vistas/$vista.php";
            }
        } else {
            include("vistas/home.php");
        }
        ?>
    </div>


    <!-- FOOTER  -->
    <?php include('includes/footer.php') ?>

    <!-- --------------SCRIPTS---------------------  -->
    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Personal Script  -->
    <script src="static/app.js"></script>

</body>

</html>