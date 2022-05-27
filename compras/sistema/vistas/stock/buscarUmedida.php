

<?php 

include "../../../conexion.php";

$id = $_POST['id'];

$consulta = "SELECT prod_umedidaId, umedida_descripcion FROM productos
join umedidas on umedida_id = prod_umedidaId
WHERE prod_id = $id";

$query = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_array($query);
echo $fila[1] ;


?>