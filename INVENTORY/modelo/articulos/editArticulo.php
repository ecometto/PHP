<?php 
include '../conexion.php';

if (isset($_POST['enviarEditar'])) {
    $id = $_POST['idArt'];
    $descripcion = $_POST['descripcion'];
    $umedida = $_POST['umedida'];
    $stock = $_POST['stock'];
    $sql = "update articulos set descripcion = '$descripcion', umedida=$umedida, stock=$stock where id = $id ";
    $query = mysqli_query($con, $sql);

}

echo "
<script>
    alert('Articulo \" $descripcion \" modificado correctamente')
    window.location.href='../../index.php?seccion=articulos/altaArticulos'
</script>";

?>
