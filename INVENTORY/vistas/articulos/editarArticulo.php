<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from articulos where id = $id";
    $query = mysqli_query($con, $sql);
    $article = mysqli_fetch_array($query);
}

$unidades = [];
$sql = "select * from umedida";
$query = mysqli_query($con, $sql);
while ($fila = mysqli_fetch_array($query)) {
    $unidades[] = $fila;
}

var_dump($article)
?>


<div class="row">
    <div class="col-6 offset-3">

        <h5 class="text-center">EDITAR ARTICULO</h5>
        <?php $article[1] ?>
        <form class="bg-light rounded p-4" action="modelo/articulos/editArticulo.php" method="POST">
            <input type="hidden" name="idArt" value="<?php echo $article[0] ?>" >
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $article[1] ?>">
            </div>
            <div class="mb-3">
                <label for="umedida" class="form-label">Unidad de medida</label>
                <select name="umedida" class="form-select" id="umedida">

                    <?php
                    foreach ($unidades as $cada) {
                        echo "<option value='$cada[0]'";
                        if ($cada[0] == $article[2]) {
                            echo 'selected';
                        }
                        echo ">$cada[1]</option>";
                    }
                    ?>

                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock Inicial</label>
                <input type="number" class="form-control" name="stock" id="stock" value="<?php echo "$article[3]"; ?>">
            </div>
            <div class="col-sm-12 d-flex justify-content-end">
                <br>
                <a href="index.php?seccion=articulos/altaArticulos"
                    class="btn btn-secondary" name="cancel" value="cancel">Cancel
                </a>
                <button type="submit" class="btn btn-success mx-4" name="enviarEditar" value="enviado">Enviar</button>
            </div>
        </form>
    </div>

</div>