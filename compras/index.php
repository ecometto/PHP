<?php
include 'conexion.php';

$mensaje = "Ingrese usuario (mail) y contraseña";
$clase = "alert-warning";

if (isset($_POST['ingresar'])) {

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];


    $query = "select id, mail, pass from users where mail = '$mail' and pass= '$pass'";
    $ejecutar = mysqli_query($conexion, $query);
    $data = mysqli_fetch_array($ejecutar);

    if (mysqli_num_rows($ejecutar) == 1) {
        $mensaje = "Bienvenido.. <br> Aguarde un instante, será redireccionado";
        $clase = "alert-success";
        session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['user_mail'] = $data['mail'];
        $_SESSION['tablaMov'] = array();

        echo "
        <script>
            setTimeout(function(){
            location = './sistema/index.php'
            },1500)
        </script>";
    } else {
        $clase = "alert-danger";
        $mensaje = "Alguno de los datos ingresados es incorrecto. <br> Por favor intentelo nuevamente.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="sistema/css/bootstrap.min.css">

    <!-- Estilos propios  -->
    <link rel="stylesheet" href="sistema/css/styles.css">
    <title>LOGIN</title>
</head>

<body>

    <div class="container">

        <div class="d-flex justify-content-center align-items-center text-center p-3 mt-5">

            <div class="row">
                <div class=" col-md-8 offset-md-2 bg-secondary p-3 rounded">

                    <h4>SISTEMA SEGUIMIENTO DE COMPRAS</h4>
                    <h3> <b>Login de usuario</b> </h3>

                    <div class="row mt-5">

                        <div class="col-md-3">
                            <div class="img-user">
                                <img src="./sistema/img/user.jpg" class="rounded-circle mr-5 img-fluid my-3" alt="User_img.jpg">
                            </div>
                        </div>

                        <div class=" col-md-8">

                            <form action="" method="POST">
                                <label class=mb-3>
                                    <input class="form-control" type="text" name="mail" placeholder="Ingrese su e-mail" required>
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

                </div>

                <h3 id="mensaje" class=" <?php echo $clase ?> p-3 mt-2"><?php echo $mensaje ?></h3>

            </div>
        </div>


    </div>

    </div>



</body>

</html>
<div></div>