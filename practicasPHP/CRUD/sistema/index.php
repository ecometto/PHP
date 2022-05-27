<?php
require "../librerias.php";
require "../conexion.php";

session_start();
if (!isset($_SESSION['estado'])) {
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistema </title>
</head>

<body>

    <p class="d-flex justify-content-end"><a href="cerrar_session.php">cerrar session</a></p>
    <h1>INDEX . PHP</h1>
</body>

</html>