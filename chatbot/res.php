<?php
include './conexion.php';

$con = Conexion::conectar();
// $con = mysqli_connect("localhost", "root", "", "bot");

if (isset($_GET['login'])) {
    $celular = $_GET['login'];
    $sql = "select * from clientes where telefono = $celular";
    $query = mysqli_query($con, $sql);
    // var_dump($query);

    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $res = mysqli_fetch_array($query);
            echo json_encode($res);
        } else {
            echo json_encode("errorUsuario");
        }
    } else {
        echo json_encode("errorUsuario");
    }
}

if (isset($_GET['pregunta'])) {
    $pregunta = $_GET['pregunta'];
    if ($pregunta == 1) {
        echo json_encode("buscandoMovil");
    } 
    else if ($pregunta == 2) {
        echo json_encode("conectarOperadora");
    } 
    else {
        $sql = "select * from respuestas where pregunta like '%$pregunta%'";
        $query = mysqli_query($con, $sql);

        if ($query) {
            if (mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_array($query);
                $res = json_encode($data);
                echo $res;
            } else {
                echo json_encode("errorRespuesta");
            }
        } else {
            echo json_encode("errorRespuesta");
        }
    }
}
