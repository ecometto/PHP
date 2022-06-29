<?php

if (isset($_POST['singUp'])) {

    if ($_POST['password'] == $_POST['password2']) {

        $nombre = $_POST['nombre'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password2 = password_hash($_POST['password2'], PASSWORD_DEFAULT);

        echo "<script>alert('Ud se ha registrado correctamente. Utilice estas credenciales para loguearse.')</script>";

        include 'conexion.php';
        $sql = "insert into usuarios (nombre, password) values('$nombre','$password')";
        $ejecutar = $con->prepare($sql);
        $ejecutar->execute();


    } else {
        echo "<script>alert('las contraseñas no coinciden')</script>";
    }
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
        <div class="col-md-6 mt-5 p-3 rounded offset-md-3 formContainer" 
        style="background:rgba(200,200,200,0.5)">
            <h5 class="text-center">FORMULARIO DE ALTA USUARIO</h5>
            <form action="" method="POST">
                <div class="mb-3 col-8 offset-2">
                    <label class="form-label" for="nombre">Ingrese nombre de usuario</label>
                    <input class="form-control" type="text" id="nombre" name="nombre">
                </div>
                <div class="mb-3 col-8 offset-2">
                    <label class="form-label" for="password">Ingrese nombre contraseña</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="mb-3 col-8 offset-2">
                    <label class="form-label" for="password">Repita la contraseña</label>
                    <input class="form-control" type="password" id="password2" name="password2">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" name="singUp">SingUp</button>
                </div>
            </form>
            <div class="text-center m-2">
                <p>If you are registred, please <a href="./login.php">Login Here</a></p>
            </div>
        </div>
    </div>
</body>

</html>