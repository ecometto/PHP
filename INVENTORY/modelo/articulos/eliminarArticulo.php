<?php  
include_once("../conexion.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $descripcion = $_GET['descripcion'];
    $sql = "delete from articulos where id = $id";
    $query = mysqli_query($con, $sql);
}

echo "
    <script>
        alert('Articulo \" $descripcion \" eliminado correctamente')
        window.location.href = '../../index.php?seccion=articulos/altaArticulos'
    </script>
    ";

?>

