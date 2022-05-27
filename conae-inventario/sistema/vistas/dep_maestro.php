<?php
if (!isset($_SESSION['mail'])) {
    header("location: ../index.php");
}

$sql = "SELECT * FROM `depositos`";
$ejecutar = mysqli_query($conexion, $sql);

?>
<div class="container text-center">

<h5>MAESTRO DE ARTICULOS</h5>
    <table class="table" STYLE="max-width: 800px; margin:auto">
        <thead >
            <tr >
                <th style="width: 10%; text-align: center;">ID</th>
                <th style="width: 30%; text-align: center;">NOMBRE</th>
                <th style="width: 60%; text-align: center;">ADICIONALES</th>
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
            </tr>";
            }
            ?>
        </tbody>
    </table>
</div>