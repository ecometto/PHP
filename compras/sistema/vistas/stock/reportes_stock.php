<?php
session_start();

//verificar que se haya iniciado sesion
if (!isset($_SESSION['user_mail'])) {
    echo "<script>location = '../index.php'</script>";
}

include "../../../conexion.php";

// if (isset($_POST['buscar'])) {
//     listarTodos();
// }

function listarStock()
{
    include "../../../conexion.php";


        if(isset($_POST['buscar'])){
        $articulos = "";

        $articuloId = $_POST['articulo'];
        if ($articuloId !== "todos"){
            $articulos = 'where det_itemid = ' .$articuloId;
        } else{
            $articulos = "";
        }

        $consulta = "select det_itemid, prod_descripcion, sum(det_cantidad), umedida_descripcion
                    from detalles_movimiento
                    join productos on prod_id = det_itemid
                    join umedidas on umedida_id = prod_umedidaid
                    $articulos
                    GROUP by det_itemid";

        $query = mysqli_query($conexion, $consulta);

        mysqli_close($conexion);

        while ($fila = mysqli_fetch_array($query)) {
            echo  "
                    <tr>
                        <td> $fila[0]</td>
                        <td> $fila[1]</td>
                        <td> $fila[2]</td>
                        <td> $fila[3]</td>
                    </tr>
                    ";
        }

        }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- datatables responsive  -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

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

    <h3 class="text-center p-2">REPORTES DE INVENTARIO</h3>

    <div class="container-fluid">
        <form action="" method="POST">
            <div class="row text-center bg-light p-2">

                <div class="col-md-4 mb-3">
                    <H5 class="mt-3 bg-secondary text-light py-2">FILTRAR POR ARTICULO</H5>
                    <select class="form-select" name="articulo" id="articulo">
                        <option value="todos" selected>TODOS</option>

                        <?php $consulta = "select prod_id, prod_descripcion from productos order by prod_descripcion";
                                $ejecutar = mysqli_query($conexion, $consulta);
                                while ($fila = mysqli_fetch_array($ejecutar)) {
                                    echo "
                                <option value=$fila[prod_id] >$fila[prod_descripcion]</option>
                                    ";
                                }
                                ?>

                    </select>
                </div>

                <!-- <div class="col-md-4 mb-3">
                            <H5 class="mt-3 bg-secondary text-light py-2">FILTRAR POR FECHA</H5>
                            <div class="d-flex mb-1">
                                Desde: <input class="form-control mx-2" type="date" name="fdesde" id="fdesde">
                            </div>
                            <div class="d-flex mb-1">
                                Hasta: <input class="form-control mx-2" type="date" name="fhasta" id="fhasta">
                            </div>
                            <div class="mb-1 border rounded p-1">
                                <span class="mr-2"> Todas:</span>
                                <input class="form-check-input" type="radio" name="ftodas" id="ftodas" checked>
                            </div>
                        </div> -->

                <div class="col-md-4 d-flex justify-content-center align-items-start mt-3">
                    <input type="submit" class="btn btn-success p-4 border" value="Buscar" name="buscar" id="buscar">
                </div>
            </div>
        </form>


        <div class="row mb-5">
            <div class="col-md-8 offset-md-2 p-5">
                <table class="w-100 table table-light table-hover table-striped" id="tabla">
                    <thead>
                        <tr class="fs-5 table-primary ">
                            <th>ID</th>
                            <th>Descripcionha</th>
                            <th>cantidad</th>
                            <th>unidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_POST['buscar'])) {
                            listarStock();
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <?php include "../footer.php" ?>
    </footer>

    <script src="../../js/jquery.min.js"></script>

    <!-- data tables  -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>


    <script>
    $(document).ready(function() {
        var table = $('#tabla').DataTable({
            responsive: true,
            language: {
                processing: "Procesando...",
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ elementos",
                info: "Mostrando  _START_  hasta  _END_  de  _TOTAL_",
                infoEmpty: "No hay elementos disponibles",
                infoFiltered: "(Sin resultados)",
                infoPostFix: " ",
                loadingRecords: "Cargando...",
                paginate: {
                    first: "Primero",
                    previous: " << Previo - ",
                    next: "- Siguiente >> ",
                    last: " Ultimo "
                },
                aria: {
                    sortAscending: ": Orden Ascendente",
                    sortDescending: ": Orden Descendente"
                }
            }
        });
        new $.fn.dataTable.FixedHeader(table);

        $('#btn_nuevo').click(function(e) {
            e.preventDefault();
            $('.nuevo').toggleClass('mostrar')

        });

    });
    </script>


    <script>
    $('#fdesde').change(function(e) {
        e.preventDefault();
        $('#ftodas').prop('checked', false);
    });
    $('#fhasta').change(function(e) {
        e.preventDefault();
        $('#ftodas').prop('checked', false);
    });
    $('#ftodas').change(
        function(e) {
            e.preventDefault()
            $('#fdesde').val('')
            $('#fhasta').val('')
        }
    )
    </script>
</body>

</html>