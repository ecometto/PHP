<?php

include "../../../conexion.php";


if (isset($_GET['delete'])) {
    $id =  $_GET['delete'];

    $consultaEliminar = "delete from productos where prod_id = $id";
    $query = mysqli_query($conexion, $consultaEliminar);
    if($query){
        echo "
        <script> alert('registro ELIMINADO')
        window.location.href= './maestro_articulos.php'
        </script>
    ";
    }    
}

if (isset($_GET['edit'])) {
    $id =  $_GET['edit'];

    $consulta = "select * from productos where prod_id = $id";

    $query = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($query) == 1) {
        $fila1 = mysqli_fetch_array($query);
        echo $fila1[3];
    }
}

if (isset($_POST['editar'])) {

    $id = $_POST['editar'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Editar Articulo</title>
</head>

<body>
    <div class="container row m-5 text-center">

        <div class="col-md-6 offset-md-3">
            <h3>Editar Articulo</h3>
            <form action="../../modelo/confirmar_modificacion_art.php" method="post">

                <div class="card-body bg-success text-light">

                    <div class="row">
                    <div class="">
                    <input type="hidden" name="id" value=" <?php echo $id;?> ">

                    </div>    
                    
                    <div class="mb-3 form-group col-4">
                            <label for="rubro">Seleccione un rubro</label> <br>
                            <select class="form-select" name="rubro" id="rubro">
                                <option value="" selected disabled>Seleccione una opcion</option>

                                <?php
                                $query_rubros = "select * from rubros ";
                                $ejecutar_rubros = mysqli_query($conexion, $query_rubros);
                                while ($fila_rubros = mysqli_fetch_array($ejecutar_rubros)) {   ?>

                                    <option value="
                                        <?php echo "$fila_rubros[rubro_id]" ?>
                                        " <?php
                                            if ($fila1[1] == $fila_rubros['rubro_id']) {
                                                echo "selected";
                                            } ?>>
                                        <?php echo $fila_rubros['rubro_descripcion']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 form-group col-8">
                            <label for="prod_descripcion">Descripcion</label> <br>
                            <input class="form-control" type="text" name="prod_descripcion" id="prod_descripcion" value=" <?php echo $fila1[2] ?> ">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 form-group col-4">
                            <label for="umedida">Unidad de medida</label> <br>
                            <select class="form-select" name="umedida" id="umedida">
                                <option value="" selected disabled>Seleccione una opcion</option>
                                <?php
                                $query_umedida = "select * from umedidas";
                                $ejecutar_umedida = mysqli_query($conexion, $query_umedida);
                                while ($fila_umedida = mysqli_fetch_array($ejecutar_umedida)) { ?>
                                    <option value='<?php echo "$fila_umedida[umedida_id]";?>
                                    '
                                    <?php if ($fila1[3] == $fila_umedida['umedida_id']) {
                                                        echo "selected";
                                                    } ?>
                                    > 
                                    <?php echo $fila_umedida['umedida_descripcion']; ?>
                                </option>
                                   
                                <?php  }  ?>
                            </select>
                        </div>

                        <div class="mb-3 form-group col-8">
                            <label for="observaciones">Detalles / Observaciones</label> <br>
                                    <textarea  class="col-12 form-control text-start" rows="4" name="observaciones" id="observaciones" >
                                        <?php echo $fila1[4] ?>
                                    </textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <input class="btn btn-primary col-4 mx-2" type="submit" name="editar" value="Cancelar" id="btn-cancelar">
                        <input class="btn btn-primary col-4 " type="submit" name="editar" value="Guardar Cambios" id="boton">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>