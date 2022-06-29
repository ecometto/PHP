<?php

if (isset($_POST['login'])) {

        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        include 'conexion.php';
        $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
        $ejecutar = $con->prepare($sql);
        $ejecutar->execute();
        $resultado = $ejecutar->fetchAll();


       // probando si la clave es la misma 
        var_dump(password_verify($password, $resultado[0][2]));

        session_start();
        $_SESSION['nombre'] = $nombre;
        $_SESSION['id'] = $resultado[0][0];

        header('location: index.php');



}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mb-5">
        
        <div class="col-md-6 mt-5 p-3 bg-secondary rounded offset-md-3 formContainer">
            <h5 class="text-center">FORMULARIO DE LOGIN</h5>
            <form action="" method="POST">
                <div class="mb-3 col-8 offset-2">
                    <label class="form-label" for="nombre">Ingrese nombre de usuario</label>
                    <input class="form-control" type="text" id="nombre" name="nombre">
                </div>
                <div class="mb-3 col-8 offset-2">
                    <label class="form-label" for="password">Ingrese nombre contraseña</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" name="login">Ingresar</button>
                </div>
            </form>
        </div>
        <div class="text-center">
            <a href="./singUp.php">Or sing up here</a>
        </div>
    </div>
</body>

</html>