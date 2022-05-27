<?php 
session_start();

//verificar que se haya iniciado sesion
if (!isset($_SESSION['user_mail'])) {
    echo "<script>location = '../index.php'</script>";
}

include "../../../conexion.php";


if(isset($_POST['agregar'])){
   $rubro = $_POST['rubro'];
   $descripcion = $_POST['descripcion'];
   $umedida = $_POST['umedida'];
   $observaciones = $_POST['observaciones'];
   $stock = $_POST['stock'];

    $sql = "insert into productos (prod_rubroId, prod_descripcion, prod_umedidaId, prod_detalles, prod_estado, stock) 
        VALUES ($rubro,'$descripcion', $umedida, '$observaciones', 'habilitado', $stock)";
        
    $ejecutar = mysqli_query($conexion, $sql);

if($ejecutar){
echo "<script>alert('Registro ingresado correctamente')</script>";
}


}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Alta de articulos</title>

</head>

<body>

    <header class="sticky-top">
        <?php include "../header.php" ?>
    </header>


    <div class="container d-flex justify-content-center m-5">

    <form class="w-75" action="" method="POST">

        <div class="card-body bg-success text-light">

            <div class="row">

                <div class="mb-3 form-group col-6">
                    <label for="rubro">Seleccione un rubro</label> <br>
                    <select class="form-select" name="rubro" id="rubro">
                        <option value="" selected disabled>Elija una opcion</option>

                            <?php 
                            $sql = "select * from rubros";
                            $ejecutar = mysqli_query($conexion, $sql);

                            while($fila = mysqli_fetch_array($ejecutar)){
                                echo "<option value='$fila[0]'>$fila[1]</option>";
                            }
                            ?>

                    </select>
                </div>


                <div class="mb-3 form-group col-6">
                    <label for="prod_descripcion">Descripcion</label> <br>
                    <input class="form-control" type="text" name="descripcion" id="prod_descripcion" ">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 form-group col-6">
                    <label for="umedida">Unidad de medida</label> <br>
                    <select class="form-select" name="umedida" id="umedida">
                        <option value="" selected disabled>Elija una opcion</option>
                            <?php 
                            $sql = "select * from umedidas";
                            $ejecutar = mysqli_query($conexion, $sql);

                            while($fila = mysqli_fetch_array($ejecutar)){
                                echo "<option value='$fila[0]'>$fila[1]</option>";
                            }
                            ?>
                    </select>
                </div>

                <div class="mb-3 form-group col-6">
                    <label for="observaciones" >Example textarea</label>
                    <textarea class="form-control" rows="4" name="observaciones" id="observaciones"></textarea>
                </div>
                
                <div class="mb-3 form-group col-6 offset-6">
                    <label for="stock">stock inicial</label> <br>
                    <input class="form-control" type="number" name="stock" id="stock" ">
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <a class="btn btn-primary col-4 mx-2" href="../../index.php"> cancelar </a>
                <input class="btn btn-primary col-4 " type="submit" name="agregar" value="Agregar" id="boton">
            </div>
    </div>
</form>

    </div>

    <footer>
        <?php include "../footer.php" ?>
    </footer>

    <script src="../../js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#descripcion').focus()

            $('#descripcion').change(function(e) {
                e.preventDefault();
                let valor = $('#descripcion').val()
                $.post("buscarUmedida.php", {
                        "id": valor
                    },
                    function(data, textStatus, jqXHR) {
                        $('#umedida').val(data);
                    },

                );

            });
        });
    </script>

</body>

</html>