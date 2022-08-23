<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="view_nuevo.php">
    <button>Ingrear Nuevo</button>
</form>

    <h3>LISTA DE PRODUCTOS</h3>
    <table>
        <thead>
            <tr>
                <th>DESCRIPCION</th>
                <th>PRICE</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            foreach($datos as $dato){
                echo "
                <tbody>
                    <tr>
                        <td>$dato[1]</td>
                        <td>$dato[2]</td>
                    </tr>
                </tbody>";
            }
            ?>
        </tbody>

        
    </table>


</body>
</html>