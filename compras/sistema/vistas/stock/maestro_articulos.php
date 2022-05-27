<?php
session_start();
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
    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- datatables responsive  -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <!-- Estilos propios  -->
    <style>
        *{
            font: size 1.5rem;
        }
        .nuevo {
            display: none;
        }

        .mostrar {
            display: block;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <header class="sticky-top">
        <?php include '../../vistas/header.php';  ?>
    </header>


    <div class="container-fluid my-3">
        <div class="row d-flex justify-content-center">
            <div>
                <a class="btn btn-success mt-3" href="./alta_articulo.php">Cargar Nuevo Articulo</button></a>
            </div>
            <div class="col-md-6 nuevo">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Nuevo producto</h3>
                    </div>

                    <form action="../../modelo/cargar_articulo.php" method="post">
                        <div class="card-body bg-success">
                            <div class="row">

                                <div class="mb-3 form-group col-md-4">
                                    <label for="rubro">Rubro</label> <br>
                                    <select class="form-select" name="rubro" id="rubro">
                                        <option value="" selected disabled>Seleccione una opcion</option>
                                        <?php
                                        $query_rubros = "select * from rubros ";
                                        $ejecutar_rubros = mysqli_query($conexion, $query_rubros);
                                        while ($fila_rubros = mysqli_fetch_array($ejecutar_rubros)) {
                                            echo "
                                            <option value='$fila_rubros[rubro_id]'>$fila_rubros[rubro_descripcion]</option>
                                            ";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3 form-group col-md-8">
                                    <label for="prod_descripcion">Descripcion</label> <br>
                                    <input class="form-control" type="text" name="prod_descripcion" id="prod_descripcion">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 form-group col-md-4">
                                    <label for="umedida">U. medida</label> <br>
                                    <select class="form-select" name="umedida" id="umedida">
                                        <option value="" selected disabled>Seleccione una opcion</option>
                                        <?php
                                        $query_umedida = "select * from umedidas";
                                        $ejecutar_umedida = mysqli_query($conexion, $query_umedida);
                                        while ($fila_umedida = mysqli_fetch_array($ejecutar_umedida)) {
                                            echo "
                                            <option value='$fila_umedida[umedida_id]'>$fila_umedida[umedida_descripcion]</option>
                                            ";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3 form-group col-md-8">
                                    <label for="observaciones">Detalles / Observaciones</label> <br>
                                    <input class="form-control" type="text" name="observaciones" id="observaciones">
                                </div>
                            </div>

                            <div>
                                <input class="btn btn-primary col-6 offset-3" type="submit" name="agregar" value="Agregar" id="boton">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12 p-5">
                <h3 class="text-center bg-secondary p-2">LISTADO DE INSUMOS</h3>

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
                                <td><?php echo $fila[2];?></td>
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
        <?php include '../../vistas/footer.php';
        ?>
    </footer>


    <!-- datatables responsive  -->
    <script src="../../js/jquery.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap.min.js"></script> -->
    <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


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

</body>

</html>