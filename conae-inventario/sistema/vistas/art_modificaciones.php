<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "select * from productos where prod_id = $id";
$ejecutar = mysqli_query($conexion, $sql);
$resultado = mysqli_fetch_row($ejecutar);

// var_dump($resultado);
?>

<div class="container text-center">

    <H4>FORMULARIO MODIFICACION DE ARTICULOS</H4>

    <div class="row m-5">
        <div class="bg-light col-md-6 offset-md-3 p-5">
            <form id="form" name="form" autocomplete="off">
                <input type="text" class="my-2" name="id" id="id" value="<?php echo $id; ?>" readonly>
                <input type="text" class="form-control my-2" name="nombre" id="nombre" value="<?php echo $resultado[1]; ?>">

                <textarea name="adicional" id="adicional" class="form-control" cols="30" rows="10" maxlength="500"><?php echo $resultado[2]; ?></textarea>
                <p style="text-align:end;">Caracteres restantes: <span class="fw-bold restantes">500</span></p>

                <select class="form-select my-2" name="categoria" id="categoria" maxlength="50">
                    <option value="" disabled>Seleccione la categoria</option>

                    <?php
                    // cargarndo select con datos
                    $sql = "select * from categorias";
                    $ejecutar = mysqli_query($conexion, $sql);
                    $resultado1 = mysqli_fetch_all($ejecutar);
                    foreach ($resultado1 as $categoria) {
                        $sel = $categoria[0] == $resultado[3]?'selected':'';
                        echo "<option value='$categoria[0] $sel'>$categoria[1]</option>";
                    } ?>
                </select>

                <input type="num" class="form-control my-2" name="stock" id="stock" value="<?php echo $resultado[4]; ?>">

                <button type="submit" id="boton" class="btn btn-success">Modificar Item</button>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        document.getElementById('nombre').focus()
        var res = document.querySelector('.restantes')

        document.getElementById('adicional').addEventListener('keyup', function(e) {
            let texto = e.target.textLength
            let restantes = (499 - texto)
            res.textContent = restantes;
        })

        let form = document.getElementById('form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            $.post(
                "../funciones/f_art_modificaciones.php",
                $('#form').serialize(),
                function(res, ) {
                    console.log(res);
                    if (res == 1) {
                        alert('Articulo modificado corectamente');
                    }
                    form.reset()
                    nombre.focus()
                    location.href= "./index.php?action=art_baja_modificaciones";
                },
            );

        })

    });
</script>