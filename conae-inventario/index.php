<?php
require "./include/head.php";
require "./config/conexion.php";

if (isset($_POST['boton'])) {
    $mail = $_POST['usuario'];
    $pass = $_POST['pass'];


    $sql = "select * from usuarios where us_mail = '$mail' and us_pass = '$pass'";
    $ejecutar = mysqli_query($conexion, $sql);
    $data = mysqli_fetch_array($ejecutar);

    if (mysqli_num_rows($ejecutar) === 1) {
        session_start();
        $_SESSION['mail'] = $data[3];
        $_SESSION['tipo'] =  $data[5];
        echo "<script> window.location = './sistema/index.php?action=principal' </script>";

    } else {
        echo "<script>alert('Alguno de los datos ingresados no es correcto')</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/misEstilos.css">

    <title>Document</title>
</head>

<body>


    <div class="contenedor">
        <div class="box loginForm">
            <h4>Formulario de Login</h4>
            <form method="POST" action="#">
                <div class="text-center">
                    <img class="rounded rounded-circle mb-4" src="./img/user.webp" alt="UserImg" width="100px">
                    <br>
                    <label for="usuario" class="form-label mb-3">
                        Usuario:
                        <input class="form-control" type="text" id="usuario" name="usuario" placeholder="ingrese e-mail de usuario">
                    </label>
                    <br>

                    <label for="usuario" class="form-label mb-3">
                        PassWord:
                        <input class="form-control" type="password" id="pass" name="pass" placeholder="ingrese su contraseña">
                    </label>
                    <br>

                    <button class="button is-link is-outlined mt-3" id="boton" name="boton"> Ingresar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var usuario = document.getElementById('usuario')
        usuario.focus()

    </script>

</body>

</html>