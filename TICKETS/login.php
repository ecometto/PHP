<?php

if (isset($_POST['log'])) {

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    if (empty($mail) or empty($pass)) {
        header('Location: login.php?m=empty');

    } else {

        include_once 'model/model_user.php';
        $user_id = User::login($mail, $pass);
        echo $user_id[0];

        if ($user_id) {
            session_start();
            $_SESSION['user_id'] = $user_id[0];
            $_SESSION['user_mail'] = $user_id[1];

            header('Location: index.php?action=index&id='.$_SESSION['user_id'] );
        }
    }
}

$mensaje = "";
if (isset($_GET['m']) and $_GET['m'] === "empty") {
    $mensaje = "Debe completar todos los campos";
}
if (isset($_GET['m']) and $_GET['m'] === "noValido") {
    $mensaje = "Error en los datos ingreados";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="lib/css/bootstrap.css">
    <title>Document</title>
</head>

<style>
    body {
        background: url('public/img/fondo1.png');
        background-position: center;
        background-size: cover;
    }

    .form-container {
        padding: 40px;
        background-color: rgba(20, 20, 20, 0.5);
        border-radius: 20px;
        text-align: center;
    }
</style>

<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="form-container">
            <div>
                <h5 class="my-4">FORMULARIO DE INGRESO</h5>
                <form action="#" method="POST">
                    <input class="form-control" type="text" name="mail" placeholder="Ingrese su e-mail"> <br>
                    <input class="form-control" type="password" name="pass" placeholder="Ingrese su password"> <br>
                    <button class="btn btn-success" name="log">clik para ingresar</button>
                </form>

                <hr>
                <br>

                <?php
                if ($mensaje != "") {
                    echo "
                         <div class='alert alert-danger'>
                             $mensaje       
                         </div>";
                }
                ?>

            </div>
        </div>
    </div>

</body>

</html>