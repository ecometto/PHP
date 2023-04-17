<?php
include('modelo/conexion.php');

if (!empty(($_POST))) {

    $username = $_POST['usuario'];
    $pass = $_POST['pass'];

    $sql = "select * from users where username = '$username' and pass = '$pass'";
    $query = mysqli_query($con, $sql);
    $user = mysqli_fetch_array($query);
    if (!empty($user)) {
        session_start();
        $_SESSION['user'] = $username;
        $_SESSION['userType'] = $user[4];
        header('location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

    <style>
        body {
            /* background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('static/img/inventory1.jpg')  no-repeat center center fixed; */
            background-size: cover;
        }

        .container-form {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form {
            background-color: rgba(22, 22, 22, 0.5);
            color: white;
            padding: 3em;
            border-radius: 1em;
        }
    </style>
</head>

<body>

    <div class="container alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error en los datos ingresados.</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="container-form">
        <div class="form">
            <h4>Formulario de Login</h4>
            <form method="POST" action="#">
                <div class="text-center">
                    <img class="rounded rounded-circle mb-4" src="static/img/user.webp" alt="UserImg" width="100px">
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

                    <button class="btn btn-success" id="boton" name="boton"> Ingresar</button>
                </div>
            </form>
        </div>
    </div>

     <!-- Bootstrap  -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var usuario = document.getElementById('usuario')
        usuario.focus()
    </script>

</body>

</html>