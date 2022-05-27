<?php
session_start();

//verificar que se haya iniciado sesion
if (!isset($_SESSION['user_mail'])) {
    echo "<script>location = '../index.php'</script>";
}

include "../../../conexion.php";

// al agregar linea 
if (isset($_POST['ingreso'])) {
    $id = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $umedida = $_POST['umedida'];
    $observaciones = $_POST['observaciones'];

    //comprabar si ya fue ingresado
    foreach ($_SESSION['tablaMov'] as $key => $value) {
        $index = array_search($id, $value, false);
        if ($index != "") {
            die("
            <script>
                alert('El articulo que intenta ingresar ya fue registrado con anterioridad');
                window.location='mov_ingreso_stock.php'
            </script>");
        }
    }

    // obteniendo descripcion del id indicado 
    $consulta = "select prod_descripcion from productos 
    where prod_id = $id";
    $query = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_row($query);

    // agregando linea a la SESSION
    $_SESSION['tablaMov'][] = [$id, $cantidad * -1, $fila[0], $umedida, $observaciones];
}

//borrar linea
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['tablaMov'] as $key => $value) {
        $index = array_search($id, $value, false);
        if ($index != "") {
            unset($_SESSION['tablaMov'][$key]);
        }
    }
}

//registrar en la DDBB
if (isset($_POST['registrar'])) {
    if (count($_SESSION['tablaMov']) > 0) {
    } else {
        die("
        <script>
            alert('No ha cargado ningún dato');
            window.location='mov_egreso_stock.php'
        </script>");
    }

    // cargando movimiento
    $query = "insert into movimientos (mov_fecha, mov_tipo) 
                values (CURRENT_DATE, 'Salida')";
    $ejecutar_query = mysqli_query($conexion, $query);
    if ($ejecutar_query) {
        $ultimo =  mysqli_insert_id($conexion);
    }

    foreach ($_SESSION['tablaMov'] as $clave => $valor) {
        // cargando detalle de movimiento
        $query2 = "insert into detalles_movimiento (det_movid, det_itemid, det_cantidad, observaciones)
                    values($ultimo, $valor[0], $valor[1], '$valor[4]')";
        $ejecutar_query2 = mysqli_query($conexion, $query2);

        // actualizando el stock
        $query3 = "update productos set stock = stock + $valor[1] where prod_id = $valor[0]";
        $ejecutar_query3 = mysqli_query($conexion, $query3);
    }

    echo "<script>
        alert('Registro de Salida registrado correctamente');
        </script>";

    $_SESSION['tablaMov'] = array();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Movimiento Egreso</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    <header class="sticky-top">
        <?php include "../header.php" ?>
    </header>


    <div class=" m-3">

        <h3 class="bg-warning text-center">Movimiento de Salida</h3>

        <div class="row ">
            <div class="col-sm-9 offset-sm-1 py-3 bg-secondary text-dark">
                <form action="" method="post">
                    <div class="row mb-3 text-light">
                        <div class="col-sm-9 ">
                            <label for="descripcion">Descripcion</label>
                            <select required class="form-select" name="descripcion" id="descripcion">
                                <option selected disabled value="">Opciones..</option>
                                <?php
                                $consulta = "select * from productos order by prod_descripcion";
                                $ejecutar = mysqli_query($conexion, $consulta);
                                while ($fila = mysqli_fetch_array($ejecutar)) {
                                    echo "
                                        <option  value='$fila[0]'>$fila[2]</option>
                                        ";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3 ">
                            <label for="umedida">U.medida</label>
                            <input required readonly class="form-control" type="text" name="umedida" id="umedida">
                        </div>

                    </div>

                    <div class="row d-flex mb-3 text-light ">
                        <div class=" col-sm-3">
                            <label for="cantidad">Cantidad</label>
                            <input required class="form-control" type="number" name="cantidad" id="cantidad" min="0" autocomplete="off">
                        </div>
                        <div class="col-sm-9">
                            <label for="observaciones">Observaciones</label>
                            <input class="form-control" type="text" name="observaciones" id="observaciones" autocomplete="off">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <input type="submit" class=" col-12 btn btn-primary" name="ingreso" value="Cargar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2 d-flex justify-items-center align-items-center">
                <form action="" method="POST">
                    <button class="btn btn-success" name="registrar" id="registrar" type="submit">Registrar <br>Movimiento</button>
                </form>
            </div>
        </div>

    </div>

    <div class="container mt-3 mb-5">
        <h4 class="text-center bg-warning">Detalle del movimiento</h4>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Cant.</th>
                <th>Descripcion</th>
                <th>Umedida</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['tablaMov'])) {
                    foreach ($_SESSION['tablaMov'] as $clave => $cada) {
                        echo " 
                    <tr>
                        <td>$cada[0]</td>
                        <td>$cada[1]</td>
                        <td>$cada[2]</td>
                        <td>$cada[3]</td>
                        <td>$cada[4]</td>
                        <td><a href='mov_ingreso_stock.php?id=$cada[0]''>eliminar</a></td>
                    </tr>
                    ";
                    }
                }
                ?>
                <a href="mov_ingreso_stock.php?id=$cada[0]"></a>

            </tbody>

        </table>

    </div>

    <footer>
        <?php include "../footer.php" ?>
    </footer>

    <script src="../../js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#descripcion').focus()

            $('#descripcion').change(function(e) {
                e.preventDefault();
                let valor = $('#descripcion').val()
                $.post("buscarUmedida.php", {
                        "id": valor
                    },
                    function(data, textStatus, jqXHR) {
                        $('#umedida').val(data);
                    },

                );

            });
        });
    </script>

</body>

</html>