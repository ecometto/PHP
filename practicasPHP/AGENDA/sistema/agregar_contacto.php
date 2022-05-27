<?php

include_once "../conexion.php";

session_start();
if (!isset($_SESSION['user_id'])) {

    header('location: index.php');
}

$mensaje = "";
$clase = "";

if (isset($_POST['agregar'])) {
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $provincia = $_POST['provincia'];
    $pais = $_POST['pais'];
    $fecha_nac = $_POST['fecha_nac'];
    $estado_civil = $_POST['ec'];

    $validar_mail = "select email from agenda where email = '$email'";
    $ejecutar_validacion = mysqli_query($conexion, $validar_mail);
    if (mysqli_num_rows($ejecutar_validacion) != 0) {

        echo "
            <script language='javascript'>";
        echo "alert('e-mail repetido') ;";
        echo "history.back();";
        echo "</script>";
    }


    $consulta = "insert into agenda values(null, '$apellido','$nombre','$tel','$email','$direccion','$ciudad','$provincia','$pais','$fecha_nac','$estado_civil',null)";

    $ejecutar = mysqli_query($conexion, $consulta);

    $mensaje = "Contacto ingresado correctamente";
    $clase = "alert alert-success";
    echo "     <script>
                    const myTimeout = setTimeout(Aviso_ingreso_ok, 2000);

                    function Aviso_ingreso_ok() {
                        const mensaje = document.getElementById('mensaje')
                        mensaje.innerHTML = ''
                        mensaje.className = ''
                    }
                </script>";
    header('location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- datatables responsive  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- estilos propios  -->
    <!-- <link rel="stylesheet" href="./css/styles.css"> -->

    <title>Document</title>

</head>

<body>

    <?php include "../sistema/vistas/header.php"  ?>

    <div class="container">

        <div class="row m-3">
            <div class="col-md-2"> <a class="text-start btn btn-info m-1 " href="./index.php">Principal</a></div>
            <div class="col-md-10">
                <h4 class="text-start my-2 ">AGREGAR NUEVO CONTACTO</h4>
            </div>
        </div>

        <div class="col-6 offset-3 text-center <?php echo $clase; ?>" id="mensaje"><?php echo $mensaje; ?></div>

        <div class="row mb-5 ag">
            <div class="col-10 offset-1 col-md-8 offset-md-2 bg-secondary rounded-3 mr-2">

                <form action="" method="POST">
                    <div class="row">
                        <div class="m-2"></div>
                        <div class="col-md-6 pt-2 border-end">
                            <div class="form-group mb-3 px-3">
                                <label for="apellido">Apellido</label>
                                <input class="form-control" type="text" name="apellido" id="apellido" required>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="tel">Telefono</label>
                                <input class="form-control" type="text" name="tel" id="tel" required>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="email" name="email" id="email" required>
                            </div>
                            <div class="form-group mb-3 px-3">
                                <label for="fecha_nac">Fecha de Nacimiento</label>
                                <input class="form-control" type="date" name="fecha_nac" id="fecha_nac" required>

                            </div>
                        </div>
                        <div class="col-md-6 pt-2">
                            <div class="form-group mb-3 px-3">
                                <label for="direccion">Domicilio</label>
                                <input class="form-control" type="text" name="direccion" id="direccion" required>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="ciudad">Ciudad</label>
                                <select class="form-select" name="ciudad" id="ciudad">
                                    <option value="" selected disabled>Elija una opcion</option>
                                    <?php
                                    $listar_city = "select * from ciudades";
                                    $ejecutar_city = mysqli_query($conexion, $listar_city);
                                    while ($fila_city = mysqli_fetch_array($ejecutar_city)) {
                                        echo "
                                        <option value='$fila_city[ciudad_id]'>$fila_city[ciudad_descripcion]</option>
                                        ";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="provincia">Provincia</label>
                                <select class="form-select" name="provincia" id="provincia">
                                    <option value="" selected disabled>Elija una opcion</option>
                                    <?php
                                    $listar_prov = "select * from provincias";
                                    $ejecutar_prov = mysqli_query($conexion, $listar_prov);
                                    while ($fila_pr = mysqli_fetch_array($ejecutar_prov)) {
                                        echo "
                                        <option value='$fila_pr[prov_id]'>$fila_pr[prov_descripcion]</option>
                                        ";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="pais">Pais</label>
                                <select class="form-select" name="pais" id="pais">
                                    <option value="" selected disabled>Elija una opcion</option>
                                    <?php
                                    $listar_paises = "select * from paises";
                                    $ejecutar_pais = mysqli_query($conexion, $listar_paises);
                                    while ($fila_p = mysqli_fetch_array($ejecutar_pais)) {
                                        echo "
                                        <option value='$fila_p[pais_id]'>$fila_p[pais_descripcion]</option>
                                        ";
                                    }
                                    ?>

                                </select>

                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="direccion">Estado Civil</label>
                                <div class="text-light border rounded-3 p-2">
                                    <label class="mx-3"> <input type="radio" name="ec" value="soltero" id="" checked> Soltero </label>
                                    <label class="mx-3"><input type="radio" name="ec" value="casado" id=""> Casado</label>
                                    <label class="mx-3"> <input type="radio" name="ec" value="otro" id=""> Otro</label>
                                </div>

                            </div>
                        </div>



                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-success m-3" type="submit" name="agregar">Agregar Contacto</button>
                            <a class="btn btn-dark m-3" href="./index.php">volver</a>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

    </div>

    <?php include "../sistema/vistas/footer.php"  ?>


</body>

</html>