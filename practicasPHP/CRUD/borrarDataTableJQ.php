<?php

include "conexion.php";
$sql = "select * from solicitantes";
$res = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> -->
    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>Document</title>
</head>
<!-- <style>
    svg{
        width: 150px;
        height: 100px;
        color: red;
    }
</style> -->
<body>

<button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="This is a Top popover. If you want to change the placement, please modify 'data-bs-placement'">
  Popover on top
</button>


    <div class="container my-5">
        <table id="example" class="display table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>solicitante_id</th>
                    <th>solicitante_nombre</th>
                    <th>solicitante_apellido</th>
                    <th>solicitante_mail</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array(($res))) {    ?>
                    <tr>
                        <td><?php echo $fila['solicitante_id']; ?></td>
                        <td><?php echo $fila['solicitante_nombre']; ?></td>
                        <td><?php echo $fila['solicitante_apellido']; ?></td>
                        <td><?php echo $fila['solicitante_email']; ?></td>
                        <td>
                            <a href="" class="btn btn-outline-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg> Modificar
                            </a>
                            <button class="btn btn-outline-danger">
                                <a href="sistema/index.php" onclick="return confirmar()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg> Eliminar
                                </a>
                            </button>
                        </td>

                    </tr>
                <?php     }    ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>solicitante_id</th>
                    <th>solicitante_nombre</th>
                    <th>solicitante_apellido</th>
                    <th>solicitante_mail</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    <script>
        function confirmar() {
            let res = confirm("desea eliminar")
            if (res) {
                return true
            } else {
                return false
            }
        }


        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    search: "Buscar:",
                    loadingRecords: "Cargando...",
                    info: "Mostrando:  _START_ a _END_ de _TOTAL_ elementos",
                    lengthMenu: "Mostrar de _MENU_ elementos",

                    paginate: {
                        first: "primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": Orden Ascendente",
                        sortDescending: ": Orden Ascendente"
                    }
                }
            });
        });
    </script>
</body>

</html>