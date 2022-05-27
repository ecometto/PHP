<?php
if (!isset($_SESSION['mail'])) {
    header("location: ../index.php");
}

$sql = "SELECT prod_id, prod_nombre, cat_nombre, prod_stock FROM `productos` 
join categorias on cat_id = prod_categoriaId";
$ejecutar = mysqli_query($conexion, $sql);

?>
<div class="container text-center">

<h5>MAESTRO DE ARTICULOS</h5>
    <table class="table">
        <thead >
            <tr >
                <th style="width: 10%; text-align: center;">ID</th>
                <th style="width: 60%; text-align: center;">NOMBRE</th>
                <th style="width: 20%; text-align: center;">CATEGORIA</th>
                <th style="width: 10%; text-align: center;">STOCK</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($filas = mysqli_fetch_array($ejecutar)) {
                echo "
            <tr>
                <td>$filas[0]</td>
                <td>$filas[1]</td>
                <td>$filas[2]</td>
                <td>$filas[3]</td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</div>