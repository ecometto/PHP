<?php

include '../conexion.php';

$whereVehiculo = "";
$whereFecha = "";
$and = "";
$whereBool = "";
$where = "";


// armando consulta where según valores de fecha y vehiculos 
// segun get de vehiculos 
if (isset($_GET['vehiculo']) and $_GET['vehiculo'] != "") {
    $vehiculo = $_GET['vehiculo'];
    $whereVehiculo = "id_vehiculo = $vehiculo ";
    $whereBool = "where";
}
// segun get de fecha 
if (isset($_GET['fecha1']) and $_GET['fecha1'] != "") {
    $fecha = $_GET['fecha1'];
    $whereFecha = "date(fecha) = '$fecha'";
    $whereBool = "where";
}
// incluyendo where si hubo get de fecha y vehiculo 
if (isset($_GET['vehiculo']) and $_GET['vehiculo'] != "" and isset($_GET['fecha1']) and $_GET['fecha1'] != "") {
    $and = "and";
}

$where = "$whereBool $whereVehiculo $and $whereFecha";
// var_dump($where);

// borrando where en caso que esté tildado el check 
if (isset($_GET['todo']) and $_GET['todo'] == "true") {
    $where = "";
}



// ejecutando consulta 
$data = [];
$sql = "select * from ubicaciones $where";
// echo $sql;
$query = mysqli_query($con, $sql);
while ($fila = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $data[] = $fila;
}
$dataJson = json_encode($data);
echo $dataJson;
