<?php
session_start();
if(!isset($_SESSION['nombre'] ) || empty($_SESSION['nombre'])){
    header('location: ./login.php');

}


function cargar_datos()
{
    global $resultado;
    include 'conexion.php';
    $consultar_datos = "select * from colores";
    $ejecutar_datos = $con->prepare($consultar_datos);
    $ejecutar_datos->execute();
    $resultado = $ejecutar_datos->fetchAll();
}

if (isset($_POST['enviar'])) {
    include 'conexion.php';
    $color = $_POST['color'];
    $descripcion = $_POST['descripcion'];

    $sql_ingresar = "insert into colores (color, descripcion) values('$color','$descripcion')";
    $ejecutar_ingresar = $con->prepare($sql_ingresar);
    $ejecutar_ingresar->execute();

    if ($ejecutar_ingresar) {
        echo "<script>alert('ingresado correctamente')</script>";
    }
    header('Location: index.php');
}
if (isset($_POST['eliminar'])) {
    include 'conexion.php';
    $id = $_POST['eliminar'];

    $sql_eliminar = "delete from colores where id = $id";
    $ejecutar_eliminar = $con->prepare($sql_eliminar);
    $ejecutar_eliminar->execute();

    header('Location: index.php');
}
if (isset($_POST['editar'])) {
    include 'conexion.php';
    $id = $_POST['editar'];

    echo $id;
    echo "<br>";
    //buscando los datos del id
    $unico = "select * from colores where id = $id";
    $ejecutar_unico = $con->prepare($unico);
    $ejecutar_unico->execute();
    $res_unico = $ejecutar_unico->fetch();
}

if(isset($_POST['update'])){
    include 'conexion.php';
    $m_id = $_POST['update'];
    $m_color = $_POST['m_color'];
    $m_descripcion = $_POST['m_descripcion'];

    $sql_update = "update colores set color = '$m_color', descripcion = '$m_descripcion' where id = $m_id";
    $ejecutar_update = $con->prepare($sql_update);
    $ejecutar_update->execute();
}
cargar_datos();

?>
<!-- ---------------------HTML ----------------- ] -->
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
    <div class="float-end bg-light p-2 text-center" >
    <h3 >User: <span class="fst-italic fw-bold"><?php echo $_SESSION['nombre'];  ?></span> </h3>
    <a href="./logout.php">LogOut</a>
    </div>
    <h3 class="text-center my-3 ">CURSO PHP</h3>
    <div class="row">
        <div class="col-md-6 text-center border rounded p-3 m-2">
            <h5>LISTA DE COLORES BOOTSTRAP</h5>
            <UL>
                <?php
                foreach ($resultado as $linea) {
                ?>
                    <li class="p-2 bg-<?php echo $linea['color'] . " ";
                                        echo ($linea['color'] == "dark" ? " text-light" : ""); ?>" style="list-style:none;">
                        <div class="">
                            <form class="" method="POST">
                                <p>  <?php echo $linea['color'] . " - " . $linea['descripcion']; ?>

                                    <button class="float-end mx-1 p-1 rounded" name="eliminar" title="Eliminar" value="<?php echo $linea['id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                        </svg>
                                    </button>

                                    <button class="float-end mx-1 p-1 rounded" name="editar" title="Editar" value="<?php echo $linea['id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </button>

                                </p>
                            </form>
                        </div>
                    </li>
                <?php
                }
                ?>
            </UL>

        </div>
        <div class="col-md-5 border rounded p-3 m-2 <?php echo isset($_POST['editar'])?'d-none':'';?>">
            <h5>INGRESO NUEVAS CLASES</h5>
            <form action="" method="POST">
                <input type="text" class="form-control m-2" name="color" id="color" placeholder="Ingrese un color">
                <input type="text" class="form-control m-2" name="descripcion" id="descripcion" placeholder="Ingrese una descripcion">
                <button class="btn btn-success" name="enviar">Enviar</button>
            </form>
        </div>
        <div class="col-md-5 border rounded p-3 m-2 <?php echo isset($_POST['editar'])?'':'d-none';?>">
            <h5>MODIFICACION DE DATOS</h5>
            <form action="" method="POST">
                <input type="text" class="form-control m-2" name="m_color" id="color" 
                    value="<?php echo $res_unico[1];?>" placeholder="Ingrese un color">
                <input type="text" class="form-control m-2" name="m_descripcion" id="descripcion"  
                    value="<?php echo $res_unico[2];?>" placeholder="Ingrese una descripcion">
                <button class="btn btn-success" name="update" value="<?php echo $res_unico[0];?>">Update</button>
            </form>
        </div>
    </div>
</body>

</html>