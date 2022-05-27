<?php
require "../librerias.php";
require "../conexion.php";

if (isset($_POST['validar'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);

    $sql = "SELECT * FROM `solicitantes` WHERE solicitante_email = '$email' and solicitante_pass = '$pass' ";
    $ejecutar = mysqli_query($conexion, $sql);
    if ($ejecutar) {
        $num_rows = mysqli_num_rows($ejecutar);
        if ($num_rows == 1) {
            $data = mysqli_fetch_array($ejecutar);
            session_start();
            $_SESSION['estado'] = "logueado";
            $_SESSION['nombre'] = $data[1];
            $_SESSION['apellido'] = $data[2];
            $_SESSION['email'] = $data[3];
            $_SESSION['tipo'] = $data[5];

            echo " <script>alert('Bienvenido. Usuario validado correctamente') 
            location.href = 'INDEX.php'</script>  ";
        }
       else{ 
        echo " <script>alert('Alguno de los datos ingresados es erroneo o incompleto. \\n Por favor intentelo nuevamente.') 
        </script>  ";
       } 
    }
}

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg-light">
    <div class="container my-5">

        <div class="row m-5">
            <div class="col-4 offset-4 text-center rounded rounded-3 bg-secondary p-3">
                <h4>FORMULARIO DE <br> LOGIN</h4>
                <form action="" method="POST">
                    <img src="user.jpg" alt="" style="border-radius: 50%;"> <br><br>
                    Mail: <input type="text" class="form-control mb-3" name="email" id="">
                    Password<input type="password" class="form-control mb-3" name="pass" id="">
                    <input type="submit" class="btn btn-info" value="Validar" name="validar"> <br><br>
                </form>
            </div>
        </div>

    </div>
</body>

</html>