<?php

if (isset($_POST['log'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    echo $mail . '<br>';
    echo $pass;

    if (empty($mail) or empty($pass)) {
        header('Location: login.php?m=empty');
    } else {
        include_once 'model/model_user.php';
        $validado = User::login($mail, $pass);
        if($validado){
            session_start();
            $_SESSION['mail'] = $mail;
            
            header('Location: index.php');
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

<body>

    <div class="mt-4 rounded container bg-primary d-flex justify-content-center align-items-center text-center" style="height: 500px; width: 350px">
        <div>
            <h5>FORMULARIO DE INGRESO</h5>
            <form action="#" method="POST">
                <input class="form-control" type="text" name="mail" placeholder="Ingrese su e-mail"> <br>
                <input class="form-control" type="text" name="pass" placeholder="Ingrese su password"> <br>
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

</body>

</html>