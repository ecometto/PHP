<?php
include './ddbb/conexion.php';
$id = "";
$title = "";
$comments = "";
$files_list = [];
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
    $id = $_POST['id'];
    if ($_POST['comment'] !== "") {
        $last_comment = "<b>" . date("d/m/Y") . "</b>" . "<br>" . $_POST['comment'] . "<br><br>";
        $merged_comments = $comments . $last_comment;
        $sql = "update requests set request_comments = '$merged_comments' where id= $id";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>
                    alert('Comment successfully added.');
                    window.location.href = './actions.php?id=$id' 
                </script>";
        }
    }
}
if ($_FILES) {
    move_uploaded_file($_FILES['file']['tmp_name'], './files/' . $_FILES['file']['name']);
}

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

            <b><i> Status: </i></b> <br>
            <select name="status">
                <option <?php
                        if ($data['request_status'] == 1) {
                            echo "selected";
                        }
                        ?> value="1">New</option>
                <option <?php
                        if ($data['request_status'] == 2) {
                            echo "selected";
                        }
                        ?> value="2">In Course</option>
                <option <?php
                        if ($data['request_status'] == 3) {
                            echo "selected";
                        }
                        ?> value="3">Finishd</option>
            </select>

            <br><br>
            <b><i> Previous Comments: </i></b>
            <p class="border p-4 rouded">
                <?php
                if ($comments !== "") {
                    echo $comments;
                } else {
                    echo "No comments yet.";
                }
                ?>
            </p>
            <p>Related Files:</p>
            <p><?php
            if ($data['request_files'] !== ""){
                $files_list = explode(",", $data['request_files']);
                foreach($files_list as $file){
                    echo "<a href='./files/$file'>$file</a> <br>";
                }
            }
            ?></p>
            <a href="./files/$file"></a>

            <form action="" class="bg-light p-4" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value=<?php echo $data[0] ?>>
                <textarea class="text-area mb-2" name="comment" placeholder="Add a comment here"></textarea>
                <input class="form-control mb-2" type="file" name="file">
                <input class="btn btn-primary mb-2" type="submit" name="enviar" value="Modificar">
            </form>

            <a class="btn btn-outline-dark" href="./index.php">BACK</a>
        </div>

    </div>

    <?php include './includes/footer.php';  ?>
</body>

</html>