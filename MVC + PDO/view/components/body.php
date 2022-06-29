<h3>aqui el body</h3>


<?php


include "conexion.php";
$sql = "select * from usuarios where nombre like '%o%'";
$respuesta = $conexion->query($sql);
if ($respuesta) {
    echo "
    <div class='d-flex justify-content-center'>
    <div  class='justify-content-center w-75'>
    <table class='table table-striped'>
        <th> ID </th>
        <th> Nombre </th>
        <th> PassWord </th>
        <th> Acciones </th>
    ";
    while ($filas = mysqli_fetch_array($respuesta)) {

        echo "

        <tr>
        <td>$filas[0]</td>
        <td>$filas[1]</td>
        <td>$filas[2]</td>
        <td><a id='$filas[id]' class='btn btn-primary' href='modificar.php?modificar=$filas[id]'>editar</a>
        <a id='$filas[id]' class='btn btn-danger' href='funciones.php?eliminar=$filas[id]'>eliminar</a></td>

    ";
    }
    echo "</table>
    </div>
    </div>";
    

} else {
    echo "PROBLEMAS AL CONSULTAR EL LISTADO DE LA BASE DE DATOS";
}


?>
