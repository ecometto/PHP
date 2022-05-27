<?php

include "conexion.php";

$query = "select * from proveedores";
$respuesta = mysqli_query($conexion, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <title>Data Tables</title>
</head>

<body>
    <tr></tr>
    <div class="container text-center">

    <h1>LISTADO DE PROVEEDORES</h1>
        <table id="proveedores" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   while ($fila = mysqli_fetch_array($respuesta)){
                    echo "
                    <tr>
                    <td>$fila[0]</td>
                    <td>$fila[1]</td>
                    <td>
                    <input type='submit' class='btn btn-success'value='Editar'>
                    <input type='submit' class='btn btn-danger'value='Eliminar'>
                    </td>
                </tr>"
                ;}
                ?>
            </tbody>
        </table>
    </div>

    <!-- JQUERY  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JQUERY bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- DATATABLES  -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


    <script>
        //SCRIPT QUE "ACTIVA" DATA TABLES
        let table = new DataTable('#proveedores', {
            // options
        });
    </script>

</body>

</html>