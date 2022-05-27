<?php
session_start();
if (!isset($_SESSION['user_mail'])) {
    echo "<script>location = '../index.php'</script>";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Estilos propios  -->
    <link rel="stylesheet" href="sistema/css/styles.css">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include './vistas/header.php';  ?>
    </header>

    <div class="container-fluid">

        <div class="row mt-5">
            <div class="col-md-4 offset-md-2 my-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title text-center bg-secondary text-light p-4">GESTION DE INVENTARIOS</h5>
                        <div class="bg-light">
                            <a class="btn btn-info col-12 my-3" href="./vistas/stock/mov_ingreso_stock.php">Registrar Ingreso de Materiales</a> <br>
                            <a class="btn btn-info col-12 my-3" href="./vistas/stock/mov_egreso_stock.php">Registrar Egreso de Materiales</a> <br>
                            <a class="btn btn-info col-12 my-3" href="./vistas/stock/maestro_articulos.php">Maestro de articulos</a><br>
                            <a class="btn btn-info col-12 my-3" href="./vistas/stock/reportes_movimientos.php">Reporte movimientos</a> <br>
                            <a class="btn btn-info col-12 my-3" href="./vistas/stock/reportes_stock.php">Reporte stock</a> <br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4  my-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title text-center bg-secondary text-light  p-4">GESTION DE COMPRAS</h5>
                        <div class="bg-light">
                            <a class="btn btn-info col-12 my-3" href="./vistas/compras/ingreso_solicitudes.php">Ingreso de solicitudes</a><br>
                            <a class="btn btn-info col-12 my-3" href="./vistas/compras/seguimiento_solicitudes.php">Seguimiento de solicitudes</a> <br>
                            <a class="btn btn-info col-12 my-3" href="./vistas/compras/reportes_solicitudes.php">Reporte Movimientos</a> <br>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <?php include './vistas/footer.php';
        ?>
    </footer>
</body>

</html>