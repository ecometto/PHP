<?php
include "conexion.php";
include "librerias.php";

$mensaje = ""; 

if (isset($_POST['validar'])) {
    $mail = $_POST['email'];
    $pass = $_POST['pass'];
    $encontrado = 0;

    $sql = "select mail, password from usuarios";
    $ejecutar = mysqli_query($conexion1, $sql);

    while ($fila = mysqli_fetch_array($ejecutar)) {
        if ($fila[0] == $mail) {
            if ($fila[1] == $pass) {
                echo "
                <script>alert('Bienvenido $fila[0]')
                window.location.href = 'DDBB_datatables.php'</script>";
                $encontrado = 1;
            }
        }
    }
    if($encontrado == 0){
        $mensaje = "usuario no encontrado";
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

<body>
    <div class="container bg-black d-flex justify-content-center align-items-center text-center text-light vh-100">

        <form action="" method="POST">
            <div class="contenedor w50 bg-secondary m-5 p-5 rounded-3">
                <h3>FORMULARIO DE LOGIN</h3>
                <img src="user.jpg" alt="" style="border-radius: 50%;"> <br><br>
                Mail: <input type="text" class="form-control mb-3" name="email" id="">
                Password<input type="password" class="form-control mb-3" name="pass" id="">
                <input type="submit" class="btn btn-info" value="Validar" name="validar"> <br><br>


            <?php 
            echo $mensaje;
            ?>
            </div>
        </form>

        <div>
        </div>

    </div>



</body>

</html>