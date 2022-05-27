<?php

session_start();
if (!isset($_SESSION['user_id'])) {

    header('location: ../index.php');
}

include "../conexion.php";


if(isset($_GET['accion'])){
    $id = $_GET['id'];
    $q_eliminar = "delete from agenda where id = $id";
    $ejecutar_q_eliminar = mysqli_query($conexion, $q_eliminar);
    if($ejecutar_q_eliminar){
        echo "
        <script>alert('registro eliminado correctamente')</script>
        ";

    }
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
    <!-- <link rel="stylesheet" href="./css/styles.css"> -->
    <title>Document</title>
</head>

<body>

    <?php include "../sistema/vistas/header.php"  ?>

    <div class="container mt-3">

        <div class="row m-3">
            <div class="col-md-2"> <a class="text-start btn btn-info m-1 " href="./index.php">Principal</a></div>
            <div class="col-md-10">
                <h4 class="text-start my-2 ">EDITAR - ELIMINAR CONTACTO</h4>
            </div>
        </div>



        <table class="table table-striped table-bordered nowrap" style="width:100%" id="tabla-contactos">
            <thead>

                <tr>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Correo Electronico</th>
                    <th>Domicilio completo (Address, City, Prov, Country)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "../conexion.php";
                $listar_contactos = "select id, apellido, nombre, email, direccion, ciudad_descripcion, prov_descripcion, pais_descripcion 
                    from agenda
                    JOIN ciudades on ciudad_id = ciudad
                    JOIN provincias on prov_id = provincia
                    JOIN paises on pais_id = pais
                    order by apellido";
                $ejecutar_listado = mysqli_query($conexion, $listar_contactos);
                while ($filas_contacto = mysqli_fetch_array($ejecutar_listado)) {
                    echo " <tr>
                            <td>$filas_contacto[1]</td>
                            <td>$filas_contacto[2]</td>
                            <td>$filas_contacto[3]</td>
                            <td>$filas_contacto[4], $filas_contacto[5] - $filas_contacto[6], $filas_contacto[7] </td>
                            <td>
                            <a href='editar.php?accion=editar&id=$filas_contacto[0]' class='btn btn-warning mx-1' >Editar</a>
                            <a href='editar_eliminar_contacto.php?accion=eliminar&id=$filas_contacto[0]' class='btn btn-danger' onclick=\"return confirm('eliminar?')\">Eliminar</a>
                            </td>

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