<?php
include "../librerias.php";
include "../conexion.php";

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];

    $sql = "select * from solicitantes where solicitante_id = $id";
    $ejecutar = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_row($ejecutar);
}

if (isset($_POST['editar'])) {
    echo $_POST['user'];
    $id1 = $_POST['user'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $mail = $_POST['email'];
    $tipo = $_POST['tipo'];

    $sql1 = "update solicitantes set solicitante_apellido = '$apellido', solicitante_nombre = '$nombre', solicitante_email='$mail', solicitante_tipo='$tipo' where solicitante_id = $id1";
    $ejecutar = mysqli_query($conexion, $sql1);
    if ($ejecutar) {
        echo "<script>alert('Usuario $apellido, $nombre modificado correctamente')
        location.href = 'ABM_usuarios.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICACION DE USUARIOS</title>
</head>



<body>

    <div class="container my-3">
        <h2 class="text-center bg-secondary my-2 py-3 "><u> MODIFICACION DE USUARIOS</u></h2>

        <div class="row text-center">
            <div class="col-md-4 offset-md-4 bg-light">
                <h4 class="py-2 m-2 bg-secondary text-light "> DATOS DEL USUARIO</h4>

                <form action="editar_usuarios.php" method="POST">
                    ID: <input type="text" readonly class="form-control mb-2" name="user" value="<?php echo "$fila[0]"; ?>">
                    Nombre: <input type="text" required class="form-control mb-2" name="nombre" value="<?php echo "$fila[1]"; ?>">
                    Apellido: <input type="text" required class="form-control mb-2" name="apellido" value="<?php echo "$fila[2]"; ?>">
                    E-mail: <input type="email" required class="form-control mb-2" name="email" value="<?php echo "$fila[3]"; ?>"> <br>
                    Tipo de Usuario: <br>
         
                    <div class="d-flex justify-content-around mb-3">
                        <div>
                            <input type="radio" <?php echo ($fila[5]=='admin'?'checked':''); ?> class="form-check-input" name="tipo" value="1" id="user">
                            <label for="user"> Administrador </label>
                        </div>
                        <div>
                            <input type="radio" <?php echo ($fila[5]=='user'?'checked':''); ?> class="form-check-input" name="tipo" value="2" id="admin">
                            <label for="admin"> Usuario </label> <br>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="MODIFICAR" name="editar" id=""> <br>
                </form>
            </div>

        </div>
    </div>
</body>

</html>