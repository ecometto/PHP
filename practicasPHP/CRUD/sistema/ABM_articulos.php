<?php
include "../librerias.php";
include "../conexion.php";

if (isset($_POST['nuevo'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['email'];
    $pass = $_POST['pass'];
    $tipo = $_POST['tipo']==1?"admin":"user";

    $sql = "insert into solicitantes values(null,'$nombre', '$apellido','$mail','$pass', '$tipo')";
    $ejecutar = mysqli_query($conexion, $sql);
    if ($ejecutar) {

        echo "<script>
        alert('Usuario $apellido, $nombre fue agregado correctamente')
        location.href = 'ABM_usuarios.php'
        </script>";
    }
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql2 = "delete from solicitantes where solicitante_id = $id";
    $ejecutar2 = mysqli_query($conexion, $sql2);
    if ($ejecutar2) {
        echo
        "<script>
        alert('Usuario eliminado correctamente')
        location.href='ABM_usuarios.php'
        </script>";
    } else {
        echo "<script>alert('se producjo algun error')</script>";
    }
}

$sql1 = "select * from solicitantes";
$ejecutar = mysqli_query($conexion, $sql1);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM ARTICULOS</title>
</head>

<body>
    <div class="container my-3">

        <h2 class="text-center bg-secondary my-3 py-3">ALTA, BAJA y MODIFICACIONES DE USUARIOS</h2>

        <div class="row text-center">

            <div class="col-md-4  border bg-light">
                <h4 class="m-3">ALTA USUARIO</h4>

                <form action="" method="POST">
                    Nombre: <input required type="text" class="form-control mb-2" name="nombre" id="">
                    Apellido: <input required type="text" class="form-control mb-2" name="apellido" id="">
                    E-mail: <input required type="email" class="form-control mb-2" name="email" id="">
                    Contraseña: <input required type="password" class="form-control mb-2" name="pass" id="">
                    Tipo de Usuario: <br>
                    <div class="d-flex justify-content-around mb-3">
                        <div>
                            <input type="radio" class="form-check-input" name="tipo" value="1" id="user">
                            <label for="user"> Administrador </label>
                        </div>
                        <div>
                            <input type="radio" class="form-check-input" name="tipo" value="2" id="admin">
                            <label for="admin"> Usuario </label> <br>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success mb-3" value="Cargar Nuevo Usuario" name="nuevo" id=""> <br>
                </form>
            </div>


            <div class="col-md-8 ">
                <h4 class="mb-4 bg-primary p-2 text-light">LISTA DE USUARIOS</h4>
                <table class="table table-hover " id="tablaUsuarios">
                    <thead>
                        <th>ID</th>
                        <th>APELLIDO</th>
                        <th>NOMBRE</th>
                        <th>E-MAIL</th>
                        <th>ACCIONES</th>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_array($ejecutar)) {  ?>
                            <tr>
                                <td><?php echo "$fila[0]" ?></td>
                                <td><?php echo "$fila[1]" ?></td>
                                <td><?php echo "$fila[2]" ?></td>
                                <td><?php echo "$fila[3]" ?></td>
                                <td>
                                    <a href="editar_usuarios.php?editar=<?php echo "$fila[0]"; ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="ABM_usuarios.php?eliminar=<?php echo "$fila[0]"; ?>" class="btn btn-sm  btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <script>
        //SCRIPT QUE "ACTIVA" DATA TABLES
        let table = new DataTable('#tablaUsuarios', {
            // options
        });
    </script>
</body>

</html>