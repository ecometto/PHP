<?php

session_start();
if (!isset($_SESSION['user_id'])) {

    header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- datatables responsive  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

    <!-- Estilos propios  -->
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid"> <?php include "../sistema/vistas/header.php"  ?></div>

    <div class="row m-1">
        <div>
            <div class="col-sm-3 d-flex justify-content-center">
                <a class="text-center btn btn-info mx-3" href="./agregar_contacto.php">Nuevo <br>Contacto</a>
                <a class="text-center btn btn-info " href="./editar_eliminar_contacto.php">Editar - Eliminar <br>contacto</a>
            </div>
        </div>
        <div class="col-sm-12">
            <h1 class="text-center my-2 ">AGENDA DE CONTACTOS</h1>
        </div>
    </div>

    <div class="container mt-3">

        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tabla-contactos">
            <thead>

                <tr>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo Electronico</th>
                    <th>Domicilio completo</th>
                    <th>Nacimiento</th>
                    <th>Estado Civil</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "../conexion.php";
                $listar_contactos = "select apellido, nombre, tel, email, direccion, ciudad_descripcion, prov_descripcion, pais_descripcion,  fecha_nac, estado_civil
                    from agenda
                    JOIN ciudades on ciudad_id = ciudad
                    JOIN provincias on prov_id = provincia
                    JOIN paises on pais_id = pais
                    order by apellido";
                $ejecutar_listado = mysqli_query($conexion, $listar_contactos);
                while ($filas_contacto = mysqli_fetch_array($ejecutar_listado)) {
                    echo " <tr>
                            <td>$filas_contacto[0]</td>
                            <td>$filas_contacto[1]</td>
                            <td> <a href='tel:$filas_contacto[2]'>$filas_contacto[2]</a>  </td>
                            <td> <a href='mailto:$filas_contacto[3]'>$filas_contacto[3]</a>  </td>
                            <td> <a target='blanck' href='https://www.google.com.gt/maps/place/$filas_contacto[4],$filas_contacto[5],$filas_contacto[6]'> $filas_contacto[4], $filas_contacto[5], $filas_contacto[6]</a></td>
                            <td>$filas_contacto[8]</td>
                            <td>$filas_contacto[9]</td>
                        </tr> ";
                }
                ?>
            </tbody>
        </table>
    </div>



    </div>



    <?php include "../sistema/vistas/footer.php"  ?>








    <!-- jquery  -->
    <script src="./js/jquery-3.6.0.min.js"></script>

    <!-- datatables responsive  -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

    <!-- js propio  -->
    <script src="./js/app.js"></script>
    <script>
        $(document).ready(function() {

            // datatables 
            var table = $('#tabla-contactos').DataTable({
                responsive: true,
                language: {
                    processing: "Procesando...",
                    search: "Buscar:",
                    lengthMenu: "Buscar _MENU_ elementos",
                    info: "Mostrando _START_ hasta _END_ de _TOTAL_",
                    infoEmpty: "No hay elementos disponibles",
                    infoFiltered: "(Sin resultados)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    paginate: {
                        first: "Primero",
                        previous: "Previo",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": Orden Ascendente",
                        sortDescending: ": Orden Descendente"
                    }
                }
            });
            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
</body>

</html>