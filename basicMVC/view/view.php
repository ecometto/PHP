<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>datos de productos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($datos as $producto){
                    echo "
                    <tr>
                        <td>$producto[1]</td>
                        <td>$producto[2]</td>
                    </tr>
                    ";
                }
            ?>
        </tbody>

    </table>
</body>

</html>