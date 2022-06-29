<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <title>pueba funciones</title>
</head>

<body>
<div class="container pt-5">
    <form class="bg-secondary p-3" action="funciones.php" method="POST">
        <label for="nombre">Ingrese Nombre: </label><input type="text" name="nombre" id="nombre" autocomplete="off"><br>
        <label for="pass">Ingrese Pass: </label><input type="text" name="pass" id="pass" autocomplete="off"><br>
        <input type="submit" value="Crear" name="crear">
    </form>
    <br><br>
    <form action="" method="POST">
        <input type="submit" value="Listar / Actualizar" name="read">
    </form>



    <table class="table">
        <tr>
            <th>ID</td>
            <th>NOMBRE</td>
            <th>PASS</td>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

        <?php


       // if (isset($_POST['read'])) {
            include "funciones.php";
            read();
        //}
        ?>

    </table>
    </div>
</body>

</html>