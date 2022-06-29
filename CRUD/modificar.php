<?php

include "conexion.php";

function completar(){
    if (isset($_GET['modificar'])) {
        
        include "conexion.php";
        $id = $_GET['modificar'];
     
        $sql = "select * from usuarios where id = $id";
        $respuesta = mysqli_query($conexion, $sql);
        if ($respuesta) {
            while ($fila = mysqli_fetch_array($respuesta)) {
                echo "
                    <form action='' method='POST'>
                        <input type='hidden' name='id' value='$fila[0]' visibili> <br>
                        <input type='text' name='nombre' value='$fila[1]'> <br>
                        <input type='text' name='pass' value='$fila[2]'> <br>
                        <button type='submit' name='actualizar'>Actualizar</button><br>
                    </form>
                    ";
            }
        } else {
            echo "NO SE PUEDO ACCEDER A LA DDBB";
        }
    }
}

if (isset($_POST['actualizar'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $pass   = $_POST['pass'];
    
    $sql_actualizar= "update usuarios set nombre = '$nombre', pass = '$pass' where id = $id;";
    $respuesta = mysqli_query($conexion, $sql_actualizar);

    echo "
    <script>
    location='index.php'
    alert('el usuario $nombre ha sido actualizado')
    </script>
    ";

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>

<div class="container">
    <h1>TITULO GRANDE DE ENCABEZADO</h1>
    <h2>SUBTITULO H2</h2>
    <br>
    <br>


<?php
completar();
?>
</div>
</body>

</html>