<?php

include_once "../conexion.php";

session_start();
if (!isset($_SESSION['user_id'])) {

    header('location: index.php');
}

if (isset($_GET['accion'])) {
    $id = $_GET['id'];

    $listar_contactos = "select id, apellido, nombre, tel, email, direccion, ciudad, provincia, pais, fecha_nac, estado_civil 
    from agenda where id = '$id'";
    $ejecutar = mysqli_query($conexion, $listar_contactos);
    $data = mysqli_fetch_array($ejecutar);
}

if(isset($_POST['modificar'])){
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$provincia = $_POST['provincia'];
$pais = $_POST['pais'];
$fecha_nac = $_POST['fecha_nac'];
$estado_civil = $_POST['estado_civil'];

$q_modificar = "update agenda set apellido = '$apellido', nombre = '$nombre', tel= '$tel', email = '$email', direccion = '$direccion', ciudad = '$ciudad', provincia = '$provincia', pais = '$pais', fecha_nac = '$fecha_nac', estado_civil = '$estado_civil' where id = $id";

var_dump($ciudad);

$ejecutar_q_modificar = mysqli_query($conexion, $q_modificar);

if($ejecutar_q_modificar){
    echo "<script>alert('Registro modificado correctamente');
    location='editar_eliminar_contacto.php'</script>";
}

// header('location: editar_eliminar_contacto.php');

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


    <!-- estilos propios  -->
    <!-- <link rel="stylesheet" href="./css/styles.css"> -->

    <title>Document</title>

</head>

<body>

    <?php include "../sistema/vistas/header.php"  ?>

    <div class="container">

        <div class="row m-3">
            <div class="col-md-2"> <a class="text-start btn btn-info m-1 " href="./editar_eliminar_contacto.php">Cancelar</a></div>
            <div class="col-md-10">
                <h4 class="text-start my-2 ">EDITAR CONTACTO</h4>
            </div>
        </div>


        <div class="row mb-5 ag">
            <div class="col-10 offset-1 col-md-8 offset-md-2 bg-secondary rounded-3 mr-2">

                <form action="" method="POST">
                    <div class="row">
                        <div class="m-2"></div>
                        <div class="col-md-6 pt-2 border-end">
                            <div class="form-group mb-3 px-3">
                                <label for="apellido">Apellido</label>
                                <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo $data['apellido'] ?>" required>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $data['nombre'] ?>" required>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="tel">Telefono</label>
                                <input class="form-control" type="text" name="tel" id="tel" value="<?php echo $data['tel'] ?>" required>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="email" name="email" id="email" value="<?php echo $data['email'] ?>" required>
                            </div>
                            <div class="form-group mb-3 px-3">
                                <label for="fecha_nac">Fecha de Nacimiento</label>
                                <input class="form-control" type="date" name="fecha_nac" id="fecha_nac" value="<?php echo $data['fecha_nac'] ?>" required>

                            </div>
                        </div>
                        <div class="col-md-6 pt-2">
                            <div class="form-group mb-3 px-3">
                                <label for="direccion">Domicilio</label>
                                <input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $data['direccion'] ?>" required>
                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="ciudad">Ciudad</label>
                                <select class="form-select" name="ciudad" id="ciudad">
                                    <option value="" disabled>Elija una opcion</option>

                                    <?php
                                    $listar_city = "select * from ciudades";
                                    $ejecutar_city = mysqli_query($conexion, $listar_city);

                                    while ($fila_city = mysqli_fetch_array($ejecutar_city)) {
                                    ?>
                                        <option value='<?php echo " $fila_city[ciudad_id] "; ?>' <?php echo $data['ciudad'] == $fila_city['ciudad_id'] ? 'selected' : ''; ?>> <?php echo "$fila_city[ciudad_descripcion]";  ?> </option>
                                    <?php } ?>

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
                                    ?>

                                        <option value='<?php echo "$fila_pr[prov_id]";?>' <?php echo $data['provincia'] == $fila_pr['prov_id'] ? 'selected' : ''; ?>>
                                        <?php echo  "$fila_pr[prov_descripcion]"; ?> </option>

                                    <?php
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
                                    ?>
                                        <option value='<?php echo "$fila_p[pais_id]";?>' <?php echo $data['pais'] == $fila_p['pais_id'] ? 'selected' : ''; ?>>
                                        <?php echo "$fila_p[pais_descripcion]"; ?></option> 

                                    <?php
                                    }
                                    ?>

                                </select>

                            </div>

                            <div class="form-group mb-3 px-3">
                                <label for="direccion">Estado Civil</label>
                                <div class="text-light border rounded-3 p-2">
                                    <label class="mx-3"> <input type="radio" name="estado_civil" value="soltero" id="" <?php echo $data['estado_civil'] == 'soltero'?'checked':''; ?>> Soltero </label>
                                    <label class="mx-3"><input type="radio" name="estado_civil" value="casado" id="" <?php echo $data['estado_civil'] == 'casado'?'checked':''; ?>> Casado</label>
                                    <label class="mx-3"> <input type="radio" name="estado_civil" value="otro" id="" <?php echo $data['estado_civil'] == 'otro'?'checked':''; ?>> Otro</label>
                                </div>

                            </div>
                        </div>



                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-success m-3" type="submit" name="modificar">Aceptar modificacion</button>
                            <a class="btn btn-dark m-3" href="./index.php">Cancelar</a>
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