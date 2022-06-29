<?php

include "conexion.php";

if (isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    create($nombre, $pass);
}
if (isset($_GET['eliminar'])){
    delete();
}


function create($nombre, $pass){
    include "conexion.php";
    // $nombre = $_POST['nombre'];
    // $pass = $_POST['pass'];

    $sql = "insert into usuarios values(null, '$nombre', '$pass')";
    $ejecutar = mysqli_query($conexion, $sql);

    header('location: index.php');
}


function read()
{
    include "conexion.php";

    $sql = "select * from usuarios order by id desc";
    $ejecutar = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_array($ejecutar)) {
        echo "
        <tr>    
        <td>$fila[id]</td>
        <td> $fila[nombre]</td>
        <td>$fila[pass]</td>
        <td><a id='$fila[id]' class='btn btn-primary' href='modificar.php?modificar=$fila[id]'>editar</a></td>
        <td><a id='$fila[id]' class='btn btn-danger' href='funciones.php?eliminar=$fila[id]'>eliminar</a></td>
        </tr>";
    }
}

function delete(){
        include "conexion.php";
        
        $id = $_GET['eliminar'];
        $sql = "delete from usuarios where id = $id";
        $ejecutar = mysqli_query($conexion, $sql);
        
        if($ejecutar){
            echo "
            <script>
            window.location = 'index.php'
            alert('Articulo $id eliminado correctamente')
            </script>
            ";
        }
        }


?>

