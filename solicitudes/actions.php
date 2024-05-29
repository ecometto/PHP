<?php
include './ddbb/conexion.php';
$id = "";
$title = "";
$comments = "";
if ($_GET) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "select * from requests where id= $id";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);
        $title = $data['request_title'];
        $comments = $data['request_comments'];
    }
}

if ($_POST) {
    $id=$_POST['id'];
    //hacer update de los comentarios de la base de datos.
    //Despues veremos lo del archivo adjunto y si se puede hacer un array con más de un archivo
    print_r($_POST);
}
// if($_FILES){
//     echo $_FILES['file']['tmp_name'];
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .text-area {
        width: 100%;
    }
</style>

<body>

    <?php include './includes/header.php'; ?>

    <div class="container">
        <div class="my-4">
            <h3><b><i>ID:</i></b> <?php echo $id; ?></h3>
            <h3><b><i>TITLE:</i></b> <?php echo $title; ?></h3>
        </div>

        <hr>

        <div class="container">
            <b><i>
                    Previous Comments:
                </i></b>
            <p class="border p-4 rouded">
                <?php
                if ($comments !== "") {
                    echo $comments;
                } else {
                    echo "No comments yet.";
                }
                ?>
            </p>

            <form action="" class="bg-light p-4" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value= <?php echo $data[0]?> >
                <textarea class="text-area mb-2" name="comment" placeholder="Add a comment here">
                </textarea>
                <input class="form-control mb-2" type="file" name="file">
                <input class="btn btn-primary mb-2" type="submit" name="enviar" value="Enviar">
            </form>
        </div>

    </div>

    <?php include './includes/footer.php';  ?>
</body>

</html>