<?php

$con = mysqli_connect('localhost', 'root', '', 'usuarios');
$consulta = "select * from usuarios";
$exec = mysqli_query($con, $consulta);


if (isset($_POST['btn'])) {
    $ayn = $_POST['ayn'];
    $email = $_POST['email'];
    $hobbies = implode(',', $_POST['op']);

    $con = mysqli_connect('localhost', 'root', '', 'usuarios');
    $load = "insert into usuarios values(null, '$ayn','123','$email','$hobbies',true)";
    $ex = mysqli_query($con, $load);
    echo "<script>alert('Registro ingresado correctamente')</script>";
    header('Location: form2.php');
}

if(isset($_POST['eliminarMultiple'])){
    $itemsElimiar = $_POST['eliminar'];
    
    $con = mysqli_connect('localhost', 'root', '', 'usuarios');

   foreach($itemsElimiar as $item){
        $query = "update usuarios set estado = 0 where id = '$item'"; 
        $ejecutar = mysqli_query($con, $query);
   }

   header('Location: form2.php');
}

if(isset($_POST['reactivar'])){
    $itemsActivar = $_POST['eliminar'];
    
    $con = mysqli_connect('localhost', 'root', '', 'usuarios');

   foreach($itemsActivar as $item){
       echo $item;

        $query1 = "update usuarios set estado = 1 where id = '$item'"; 
        $ejecutar = mysqli_query($con, $query1);
   }

   header('Location: form2.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form2</title>
</head>

<body>
    <div class="container mt-5">



        <div>
            <h3>listado de usuarios</h3>

            <form action="" method="POST">
                <table class="table">
                    <thead>
                        <th>id</th>
                        <th>ayn</th>
                        <th>email</th>
                        <th>hobbies</th>
                        <th>estado</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($fila = mysqli_fetch_array($exec)) {
                            echo "
                            <tr>
                            <td>$fila[id]</td>
                            <td>$fila[nombre]</td>
                            <td>$fila[email]</td>
                            <td>$fila[hobbies]</td>
                            <td>$fila[estado]</td>
                                <td>
                                    <a href='form2.php?edit=editar&id=$fila[id]' class='btn btn-warning'> Editar</a>

                                    <input type='checkbox' name='eliminar[]' value='$fila[id]'>

                                </td>
                            </tr>
                            
                            ";
                        }
                        ?>

                    </tbody>

                </table>

                <div class="d-flex justify-content-end mx-5">
                    <input type="submit" name="eliminarMultiple" value="eliminarMultiple"></input>

                    <input type="submit" name="reactivar" value="Re-Activar Item"></input>
                </div>
            </form>

          

            <br><br>
        </div>

       <?php 
            if(isset($_GET['edit'])){
                $id_edit = $_GET['id'];
                $consulta_editar = "select * from usuarios where id = '$id_edit'";
                $ejecutar = mysqli_query($con, $consulta_editar);
                $fila = mysqli_fetch_array($ejecutar);

                ?>
            
                <h4>EDITAR.. </h4>
                <form action="" method="POST">
                    <label> Apellido y nombre <input type="text" name="edit_ayn" value = "<?php echo $fila['nombre']?>"></label><br>
                    <label> Email <input type="text" name="edit_email" value = "<?php echo $fila['email']?>"></label><br>
                    <label><input type="checkbox" name="op[]" value="op1" id="">Opcionn 1</label><br>
                    <label><input type="checkbox" name="op[]" value="op2" id="">Opcionn 2</label><br>
                    <label><input type="checkbox" name="op[]" value="op3" id="">Opcionn 3</label><br>
                    <label><input type="checkbox" name="op[]" value="op4" id="">Opcionn 4</label><br>
                    <button type="submit" name="btn">Enviar</button>
    
                </form>
        <?php 
            }
       ?>

       <h4>NUEVO USUARIO</h4>
            <form action="" method="POST">
                <label> Apellido y nombre <input type="text" name="ayn" id=""></label><br>
                <label> Email <input type="text" name="email" id=""></label><br>
                <label><input type="checkbox" name="op[]" value="op1" id="">Opcionn 1</label><br>
                <label><input type="checkbox" name="op[]" value="op2" id="">Opcionn 2</label><br>
                <label><input type="checkbox" name="op[]" value="op3" id="">Opcionn 3</label><br>
                <label><input type="checkbox" name="op[]" value="op4" id="">Opcionn 4</label><br>
                <button type="submit" name="btn">Enviar</button>

            </form>

      


    </div>

</body>

</html>