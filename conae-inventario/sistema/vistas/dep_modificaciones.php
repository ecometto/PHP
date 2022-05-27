<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "select * from depositos where dep_id = $id";
$ejecutar = mysqli_query($conexion, $sql);
$resultado = mysqli_fetch_row($ejecutar);

// var_dump($resultado);
?>

<div class="container text-center">

    <H4>FORMULARIO MODIFICACION DE ARTICULOS</H4>

    <div class="row m-5">
        <div class="bg-light col-md-6 offset-md-3 p-5">
            <form id="form" name="form" autocomplete="off">
                <input type="text" class="form-control my-2" name="id" id="id" value="<?php echo $resultado[0];?> " readonly>
                <input type="text" class="form-control my-2" name="nombre" id="nombre" value="<?php echo $resultado[1];?>">
                <input type="num" class="form-control my-2" name="adicionales" id="adicionales" value="<?php echo $resultado[2];?>">
                <button type="submit" id="boton" class="btn btn-success">Modificar Deposito</button>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        document.getElementById('nombre').focus()
        var res = document.querySelector('.restantes')

        let form = document.getElementById('form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            $.post(
                "../funciones/f_dep_modificaciones.php",
                $('#form').serialize(),
                function(res, ) {
                    console.log(res);
                    if (res == 1) {
                        alert('registro modificado corectamente');
                    }
                    form.reset()
                    nombre.focus()
                    location.href= "./index.php?action=dep_baja_modificaciones";
                },
            );

        })

    });
</script>