<?php
$vigentes = [];
$finalizadas = [];
foreach ($tickets as $t) {
    if ($t[6] !== "cerrado") {

        $status = "";
        $disabled = 'none';
        switch ($t[6]) {
            case 'activo':
                $status =  '';
                break;
            case 'en curso':
                $status =  'en_curso';
                break;
            case 'solucionado':
                $status =  'solucionado';
                $disabled = 'block';
                break;
        }
        $vigentes[] = "
                                        <tr class='$status' style='width: 90px;'>
                                            <td>$t[0]</td>
                                            <td>$t[1]</td>
                                            <td>$t[2]</td>
                                            <td>$t[3]</td>
                                            <td>$t[4]</td>
                                            <td>$t[6]</td>
                                            <td class='' style='text-align: center;'>
                                                    <a href='index.php?action=consultar&id=$t[0]' class='col-6 btn btn-primary me-1'><i class='bi bi-search'></i></a>
                                                    <a href='index.php?action=cerrar&id=$t[0]' style='display: $disabled; margin:auto;' class='col-6 btn btn-secondary '><i class='bi bi-x-circle'></i></a>
                                            </td>
                                        </tr>
                                    ";
    } else if ($t[6] === "cerrado") {
        $finalizadas[] = "
                        <tr style='width: 90px;'>
                            <td>$t[0]</td>
                            <td>$t[1]</td>
                            <td>$t[2]</td>
                            <td>$t[3]</td>
                            <td>$t[4]</td>
                            <td>$t[6]</td>
                 
                        </tr>
                    ";
    }
}

?>

<!-- ---------------------------------------------------  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .en_curso {
        background-color: rgba(170, 224, 245, 0.1);
    }

    .solucionado {
        background-color: rgb(170, 224, 245, 0.3);
    }
</style>

<body>
    <div class="container">


        <?php
        // LISTANDO PARA ADMINISTRADORES (TIPO ADMIN) 
        if ($_SESSION['user_tipo'] === 'admin') {

            if (count($vigentes) < 1) {

                echo "sin registros";
            } else {
        ?>

                <div class="d-flex flex-column">
                    <h3 class='text-center bg-secondary p-2 mt-1'>LISTA DE TICKETS PENDIENTES</h3>;

                    <table class=" table text-center">
                        <thead>
                            <tr>
                                <th style="width:3%">ID</th>
                                <th style="width:10%">FECHA</th>
                                <th style="width:10%">AREA</th>
                                <th style="width:20%">TITULO</th>
                                <th style="width:35%">DETALLES</th>
                                <th style="width:10%">STATUS</th>
                                <th style="width:12%">ACCIONES</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($vigentes as $v) {
                                echo $v;
                            }
                            ?>
                        </tbody>

                    </table>

                <?php
            }
        } else {
            // LISTANDO PARA USUARIOS COMUNES (TIPO USER) 

            echo "<a href='index.php?action=nuevo' class='btn btn-primary m-2'>Nuevo Ticket</a>";

            if (count($vigentes) < 1) {

                echo "sin registros";
            } else {
                ?>

                    <div class="d-flex flex-column">
                        <h3 class='text-center bg-secondary p-2 mt-1'>MIS TICKETS</h3>;

                        <table class=" table text-center">
                            <thead>
                                <tr>
                                    <th style="width:3%">ID</th>
                                    <th style="width:10%">FECHA</th>
                                    <th style="width:10%">AREA</th>
                                    <th style="width:20%">TITULO</th>
                                    <th style="width:35%">DETALLES</th>
                                    <th style="width:10%">STATUS</th>
                                    <th style="width:12%">ACCIONES</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($vigentes as $v) {
                                    echo $v;
                                }
                                ?>
                            </tbody>

                        </table>



                        <!-- LISTANDO FINALIZADAS  -->
                        <?php
                        if (count($finalizadas) < 1) {
                            echo "";
                        } else {
                        ?>

                            <div class="d-flex flex-column mb-5">
                                <h3 class="text-center bg-secondary p-2">LISTA DE TICKETS FINALIZADOS</h3>

                                <table class=" table text-center">
                                    <thead>
                                        <tr>
                                            <th style="width:3%">ID</th>
                                            <th style="width:10%">FECHA</th>
                                            <th style="width:10%">AREA</th>
                                            <th style="width:20%">TITULO</th>
                                            <th style="width:30%">DETALLES</th>
                                            <th style="width:15%">STATUS</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        foreach ($finalizadas as $f) {
                                            echo $f;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                    </div>

        <?php
                        }
                    }
                }
        ?>


</body>

</html>