<?php
include './conexion.php';

if (isset($_GET)) {
    $con = conectar();

    $id = $_GET['id'];
    $sql = "select * from contacts where id = $id";
    $query = mysqli_query($con, $sql);
    $res = mysqli_fetch_array($query, MYSQLI_BOTH);
    // var_dump($res);
}

if (isset($_POST['name'])) {
    $con = conectar();

    var_dump($_POST);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];

    $sql = "update contacts set name='$name', mail='$mail' where id=$id";
    $query = mysqli_query($con, $sql);
    // header(('Location:./index.php'));
    echo "<script>alert('registro modificado correctamente')
    window.location='./index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">





<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editing</title>
</head>

<body>
    <div class="container">
        <section>
            <h1 class="m-4 text-center">NUEVO CRUD FOR PRACTICE</h1>

            <div class="row">
                <div class="col-4 p-4 offset-4 bg-primary rounded">
                    <h3 class="mb-4 text-center"> EDITING CONTACT</h3>

                    <form action="#" method="POST">
                        ID: <input readonly class="p-2" name="id" type="text" style="width:60px; height:40px" value="<?php echo $res[0]; ?>"> <br>
                        nombre: <input class="form-control" name="name" type="text" value=<?php echo $res[1]; ?>> <br>
                        mail: <input class="form-control" name="mail" type="text" value=<?php echo $res[2]; ?>> <br>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success">Edit</button>
                        </div>
                        <br>
                    </form>

                </div>
        </section>
    </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>