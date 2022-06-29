<?php 

include '../yt_colores/conexion.php';

$sql = "select * from usuarios";
$prepare = $con->prepare($sql);
$prepare->execute();
$res = $prepare->fetchAll();

var_dump($res);

?>
<img src="" alt="">