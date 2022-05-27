<?php 
include '../config/conexion.php';

$art =  $_POST['art'];

$sql = "delete from productos where prod_id = $art";
$ejecutar = mysqli_query($conexion, $sql);

$consultar = "SELECT prod_id, prod_nombre, cat_nombre, prod_stock FROM `productos` 
join categorias on cat_id = prod_categoriaId";
$ejecutar_consultar = mysqli_query($conexion, $consultar);
while($filas = mysqli_fetch_array($ejecutar_consultar)){
    echo "<tr>
            <td>$filas[0]</td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td><button id='$filas[0]' data-action='editar' class='btn btn-warning btn-sm'><a href='./index.php?action=art_modificaciones&id=$filas[0]' style='text-decoration:none;'>Editar</a></button></td>
            <td><button id='$filas[0]' data-action='eliminar' class='btn btn-danger btn-sm'>Eliminar</button></td>
        </tr>";
}


?>