<?php
session_start();

//verificar que se haya iniciado sesion
if (!isset($_SESSION['user_mail'])) {
    echo "<script>location = '../index.php'</script>";
}

include "../../../conexion.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Reportes de Stock</title>

    <style>
        /* input[type="date"]{
            font-size: 15px;
        } */
    </style>
</head>

<body>

    <header class="sticky-top">
        <?php include "../header.php" ?>
    </header>

    <h3 class="text-center p-2">REPORTES DE MOVIMIENTOS DE STOCK</h3>

    <div class="container-fluid">
        <div class="row text-center bg-light p-2">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-4">
                        <H5 class="mt-3">FILTRAR POR ARTICULO</H5>
                        <select class="form-select" name="articulo" id="articulo">
                            <option value="todos" selected>TODOS</option>
                            <option value="1">articulo1</option>
                            <option value="2">articulo2</option>
                            <option value="3">articulo3</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <H5 class="mt-3">FILTRAR POR FECHA</H5>
                        <div class="d-flex mb-1">Desde: <input class="form-control" type="date" name="fdesde" id="fdesde"></div>
                        <div class="d-flex mb-1"> Hasta: <input class="form-control" type="date" name="fhasta" id="fhasta"></div>
                        <div class="d-flex justify-content-around mb-1 border rounded p-1"> Todas: <input class="form-check-input" type="radio" name="ftodas" id="ftodas"></div>
                    </div>

                    <div class="col-md-4">
                        <H5 class="mt-3">FILTRAR POR TIPO</H5>
                        <div class="border rounded p-1 mb-1">Entradas <input type="radio" name="entradas" id="entradas"> </div>
                       <div class="border rounded p-1 mb-1"> Salidas <input type="radio" name="salidas" id="salidas"> </div>
                        <div class="border rounded p-1">Todos <input type="radio" name="todos" id="todos" checked></div>

                    </div>
                </div>
            </div>
            <div class="col-md-1 d-flex justify-content-center align-items-center mt-3">
                <input type="submit" class="btn btn-success p-4 border" value="Buscar" name="buscar" id="buscar">
            </div>
        </div>


        <div class="row mb-5">
            <div class="col-md-12 p-5">
                <table class="w-100 table table-light table-hover table-striped" id="tabla">
                    <thead>
                        <tr class="fs-5 table-primary ">
                            <th>id</th>
                            <th>rubro</th>
                            <th>descripcion</th>
                            <th>Unidad</th>
                            <th>Detalles</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consulta = "select prod_id, rubro_descripcion, prod_descripcion, umedida_descripcion, prod_detalles 
                        from productos
                        JOIN rubros on rubro_Id = prod_rubroId
                        JOIN umedidas on umedida_id = prod_umedidaId";

                        $query = mysqli_query($conexion, $consulta);
                        while ($fila = mysqli_fetch_array($query)) {?>
                            
                            <tr>
                                <td><?php echo $fila[0];?></td>
                                <td><?php echo $fila[1];?></td>
                                <td><?php echo $fila[2];?>]</td>
                                <td><?php echo $fila[3];?></td>
                                <td><?php echo $fila[4];?></td>
                                <td class='d-flex'>     
                                <a class='btn btn-warning mx-1' href='./editar_articulo.php?edit= <?php echo $fila[0];?> '>Edit</a> 
                                <a class='btn btn-danger mx-1' href='./editar_articulo.php?delete= <?php echo $fila[0];?> ' onclick="return confirm('¿Está seguro que desea eliminar el articulo?')"> Delete </a>
                                </td>
                            </tr>

                        <?php   }    ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <?php include "../footer.php" ?>
    </footer>

</body>

</html>