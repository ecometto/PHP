<?php
include 'modelo/conexion.php';

// if (isset($_POST['enviarAlta'])) {
//     $descripcion = $_POST['descripcion'];
//     $umedida = $_POST['umedida'];
//     $stock = $_POST['stock'];
//     $sql = "insert into articulos values(null, '$descripcion', $umedida, $stock)";
//     $query = mysqli_query($con, $sql);
// }

$unidades = [];
$sql = "select * from umedida";
$query = mysqli_query($con, $sql);
while ($fila = mysqli_fetch_array($query)) {
    $unidades[] = $fila;
}

$articulos = [];
$sql = "select * from articulos";
$query = mysqli_query($con, $sql);
while ($fila = mysqli_fetch_array($query)) {
    $articulos[] = $fila;
}

?>

<div class="chevron-container <?php echo ($_SESSION['userType'] == 'admin' ? 'd-block' : 'd-none') ?> "> 
    <button class="buton-alta btn btn-success">Nuevo
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ffffff" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
    </button>
</div>

<!-- FORMULARIO --------------------------------------------- -->
<div class="form-container-alta bg-light border p-3 rounded m-2">
    <h5 class="text-center">ALTA DE ARTICULOS</h5>

    <form class="row" action="modelo/articulos/altaArticulo.php" method="POST">
        <div class="mb-3 col-sm-6">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion">
        </div>
        <div class="mb-3 col-sm-2">
            <label for="umedida" class="form-label">Unidad de medida</label>
            <select name="umedida" class="form-select" id="umedida">
                <option selected disabled value="">Seleccione</option>
                <?php
                foreach ($unidades as $cada) {
                    echo "<option value='$cada[0]'>$cada[1]</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3 col-sm-2">
            <label for="stock" class="form-label">Stock Inicial</label>
            <input type="number" class="form-control" name="stock" id="stock">
        </div>
        <div class="col-sm-2">
            <br>
            <button type="submit" class="btn btn-success" name="enviarAlta" value="enviado">Enviar</button>
        </div>
    </form>
</div>


<!-- TABLE -------------------------------------------------  -->
<div>
    <table class="table my-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>DESCRIPCION</th>
                <th>U.MEDIDA</th>
                <th>STOCK</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($articulos as $articulo) {
                echo "
                <tr>
                    <th>$articulo[0]</th>
                    <th>$articulo[1]</th>
                    <th>$articulo[2]</th>
                    <th>$articulo[3]</th>
                    <th>
                    <a href='index.php?seccion=articulos/editarArticulo&id=$articulo[0]' class='btn btn-warning'>Edit...</a>
                    <a href='modelo/articulos/eliminarArticulo.php?id=$articulo[0]&descripcion=$articulo[1]' class='btn btn-danger'>Delete</a>
                    </th>
                </tr>";
            }

            ?>


        </tbody>
    </table>
</div>