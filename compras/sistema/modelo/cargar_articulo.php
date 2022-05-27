<?php

include '../../conexion.php';


$mensaje = "";
if (isset($_POST['agregar'])) {
    // print_r( $_POST);
    $rubro = $_POST['rubro'];
    $descripcion = $_POST['prod_descripcion'];
    $umedida = $_POST['umedida'];
    $observaciones = $_POST['observaciones'];

    $consulta = "insert into productos values 
    (null, $rubro, '$descripcion', $umedida, '$observaciones', null, 0)";

    $query = mysqli_query($conexion, $consulta);

    if ($query) {
        $mensaje = "registro ingresado correctamente";
        
        echo "
            <script> alert('registro ingresado correctamente')
            window.location.href= '../vistas/stock/maestro_articulos.php'
            </script>
        ";
     
    } 
    // else{
    //     echo "
    //     <script> alert('problemas con la registracion')
    //     window.location.href= '../vistas/stock/maestro_articulos.php'
    //     </script>
    // ";
    // }
}
