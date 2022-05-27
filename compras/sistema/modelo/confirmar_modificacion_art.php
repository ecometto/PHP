<?php

include '../../conexion.php';

$mensaje = "";
if (isset($_POST['editar'])) {
    // print_r( $_POST);
    $id = $_POST['id'];
    $rubro = $_POST['rubro'];
    $descripcion = $_POST['prod_descripcion'];
    $umedida = $_POST['umedida'];
    $observaciones = $_POST['observaciones'];

    $consulta = "UPDATE productos SET prod_rubroId = $rubro , prod_descripcion = '$descripcion', prod_umedidaId = $umedida , prod_detalles = '$observaciones' WHERE prod_id = $id";

    $query = mysqli_query($conexion, $consulta);

    if ($query) {
        $mensaje = "registro modificado correctamente";
        
        echo "
            <script> alert('$mensaje')
            window.location.href= '../vistas/stock/maestro_articulos.php'
            </script>
        ";
     
    }
}
