<?php 
include '../conexion.php';

if (isset($_POST['enviarAlta'])) {
    $descripcion = $_POST['descripcion'];
    $umedida = $_POST['umedida'];
    $stock = $_POST['stock'];
    $sql = "insert into articulos values(null, '$descripcion', $umedida, $stock)";
    $query = mysqli_query($con, $sql);
}

echo "
<script>
    alert('Articulo \" $descripcion \" ingresado correctamente')
    window.location.href='../../index.php?seccion=articulos/altaArticulos'
</script>";

?>
<!-- window.history.back(-1)  -->
