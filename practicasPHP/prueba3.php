<?php

var_dump($_GET);
// VER COMO HACER PARA NO TENR QUE ESCRIBIR "IF ISSET" 
$nombre = "";
$mensaje = "";
if (isset($_GET['nombre'])){
    $nombre = $_GET['nombre'];
    $mensaje = <<<RES

    hola $nombre

    RES;
}
?>

<!-- 
$mensaje =   <<<EOT
    <h3 id="magd"> BIENVENIDO $nombre</h3>
    EOT; -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>SALUDO</h1>
    <form>
        <input type="text" id="nombre" name="nombre">
        <input type="checkbox" name="uno" id="">Uno
        <input type="checkbox" name="dos" id=""> Dos
        <input type="checkbox" name="tres" id=""> Tres
        <button type="submit">click</button>
    </form>

    <div class="saludo">
        <?php 
        echo $mensaje
        ?>
    </div>
</body>

</html>