
<?php
include './ddbb/conexion.php';

if($_POST){
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];
    $sql = "select * from users where usermail = '$usermail' and pass='$password'";
    $query = mysqli_query($conn, $sql);
    $userData = mysqli_fetch_array($query);
    if(!$userData){
        echo "intentelo de nuevo";
    }else{
        session_start();
        $_SESSION['usermail'] = $userData[2]; 
        Header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<div class="container d-flex justify-content-center mt-4 text-center">
    <div class="w-50 bg-secondary p-4 border rounded">
        <H3>LOGIN</H3>
        <form action="" method="POST">
            mail <input name="usermail" class="form-control mb-4" type="text">
            password <input name="password" class="form-control mb-4" type="password" >
            <button class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
</body>
</html>