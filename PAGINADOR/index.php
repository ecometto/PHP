<?php
$cant = 3;
include './conexion.php';

if (isset($_POST['cant'])) {
    $cant = $_POST['cant'];
}


$consulta_general = "select * from prueba";
$ejecutar_general = mysqli_query($con, $consulta_general);
$total_usuarios = mysqli_num_rows($ejecutar_general);
$pagina_actual = $_GET['pag'];
$paginar = $cant;
$total_paginadores = ceil($total_usuarios / $paginar);
$p_desde = ($pagina_actual - 1) * $paginar;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="./bootstrap5/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <h1>LISTADO DE PERSONAS</h1>

        <div class="row border justify-content-between text-center">

            <div class="col-md-4 p-4">
                <H5>FORMULARIO DE INGRESO</H5>
                <form action="#" method="POST">
                    <input class="mb-2 form-control" type="text" name="usuario" id="usuario" placeholder="Ingrese usuario">
                    <input class="mb-2 form-control" type="text" name="mail" id="mail" placeholder="Ingrese mail">
                    <button class="mb-3 btn btn-info">Agregar</button>
                </form>
            </div>
            <div class="col-md-7 mx-1 p-4">
                <h5>LISTADO DE PERSONAS</h5>


                <div class="d-flex justify-contente-start">
                    <form action="#" method="POST" name="form">
                        Cant. por pagina:
                        <select class="px-2 mx-2" name="cant" id="cant" onchange="this.form.submit()">
                            <option value="">Choice an option</option>
                            <option value="3" <?php echo $cant == "3"?"selected":""?>>3</option>
                            <option value="5" <?php echo $cant == "5"?"selected":""?>>5</option>
                            <option value="7" <?php echo $cant == "7"?"selected":""?>>7</option>
                        </select>
                    </form>
                </div>


                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>USUARIO</th>
                            <th>MAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consulta = "select * from prueba LIMIT $p_desde,$paginar";
                        $ejecutar = mysqli_query($con, $consulta);
                        while ($res = mysqli_fetch_array($ejecutar)) {

                            echo "  <tr>
                                        <td>$res[0]</td>
                                        <td>$res[1]</td>
                                        <td>$res[2]</td>
                                    </tr>";
                        };
                        ?>

                    </tbody>
                </table>

                <!-- paginacion  -->
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item <?php echo $pagina_actual <= 1 ? 'disabled' : ''; ?> ">
                                <a class="page-link" href="index.php?pag=<?php echo ($pagina_actual - 1) ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                            <?php

                            for ($i = 1; $i <= $total_paginadores; $i++) { ?>
                                <li class='page-item <?php echo $pagina_actual == $i ? 'active' : ''; ?>'>
                                    <a class='page-link' href="index.php?pag=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php } ?>


                            <li class="page-item <?php echo $pagina_actual >= $total_paginadores ? 'disabled' : ''; ?>">
                                <a class="page-link" href="index.php?pag=<?php echo ($pagina_actual + 1) ?>">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

    </div>
    <script src="./jquery-3.6.0.min.js"></script>
    <script>
        // $(document).ready(function () {

        //     var $selectCant = document.getElementById('cant');
        //     $selectCant.addEventListener('change', function(){
        //         var $cant = $selectCant.value;

        //         $.ajax({
        //             type: "POST",
        //             url: "get_cantidad.php",
        //             data: {"cant": $cant},
        //             success: function (response) {
        //                 alert(response)
        //             }
        //         });
        //     }

        // });
    </script>
</body>

</html>