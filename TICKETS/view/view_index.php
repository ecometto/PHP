<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php?action=nuevo" class="btn btn-primary m-2">Nuevo Ticket</a>

    <div class="d-flex flex-column">
        <h3 class="text-center">LISTA DE PRODUCTOS</h3>

        <table class=" table text-center">
            <thead>
                <tr>
                    <th style="width:10%">ID</th>
                    <th style="width:10%">FECHA</th>
                    <th style="width:10%">AREA</th>
                    <th style="width:20%">TITULO</th>
                    <th style="width:40%">DETALLES</th>
                    <th style="width:10%">ACCIONES</th>
                </tr>
            </thead>
            <tbody>

                <?php

                foreach($tickets as $t){
                    echo "
                        <tr style='width: 90px;'>
                            <td>$t[0]</td>
                            <td>$t[1]</td>
                            <td>$t[2]</td>
                            <td>$t[3]</td>
                            <td>$t[4]</td>
                            <td><button id='$t[0]' class='btn btn-success'>consultar</button></td>

                        </tr>
                        ";
                    
                }
                ?>

            </tbody>


        </table>
    </div>


</body>

</html>