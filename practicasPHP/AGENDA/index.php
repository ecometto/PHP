<?php
include_once "conexion.php";
$mensaje = "";

if (isset($_POST['ingresar'])) {
    $mail = $_POST['email'];
    $pass = $_POST['pass'];
    $consulta = "select * from usuarios where usuario_email ='$mail' and usuario_pass = '$pass'";
    $ejecutar = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_array($ejecutar);
    $cant_filas = mysqli_num_rows($ejecutar);
    if ($cant_filas == 1) {
        session_start();
        $_SESSION['user_id'] = $fila[0];
        $_SESSION['user_mail'] = $mail;

        header('location: sistema/index.php');
    } else {
        $mensaje = "Alguno de los datos ingresados es incorrecto";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sistema/css/bootstrap.min.css">
    <link rel="stylesheet" href="sistema/css/styles.css">
    <title>LOGIN</title>
</head>

<body>

    <div class="container">
        <div class="contenedor d-flex justify-content-center align-items-center text-center bg-secondary p-3 ">

            <div class="w-75 bg-light p-3 rounded ">

                <h3> Login de usuario</h3>

                <div class="d-flex flex-md-row flex-column text-center align-items-center justify-content-center m-3 p-3">
                    <div class="img-user m-3">
                        <img src="user.jpg" alt="user.jpg" width="150px">
                    </div>

                    <div class="formulario_login m-3">

                        <form action="" method="POST">
                            <label class=mb-3>
                                <input class="form-control" type="text" name="email" placeholder="Ingrese su e-mail" required>
                            </label>
                            <br>

                            <label class=mb-3>
                                <input class="form-control" type="password" name="pass" placeholder="Ingrese su clave" required>
                            </label>
                            <br>

                            <div>
                                <input class="btn btn-success" type="submit" name="ingresar" value="Ingresar">
                            </div>
                        </form>

                    </div>
                </div>

                <hr>
                <p class="alert-warning"><?php echo $mensaje ?></p>

                <h5> Sistema de Agenda de contactos</h5>

            </div>
        </div>

    </div>

</body>

</html>
<div></div>