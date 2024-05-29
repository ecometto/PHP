<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./statics/styles.css">
    <title>Document</title>
    <style>
        .home-link {
            color: white;
            text-decoration: none;
            font-size: 25px;
            text-align: center;
        }
        .title{
            margin: 5px;
            font-size: 35px;
            color: white;
            text-align: center;
        }
        .user{
            font-size: 25px;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-2 bg-secondary d-flex justify-content-center align-items-center">
            <a class="home-link" href="/PHP/solicitudes/index.php">
                HOME
            </a>
        </div>
        <div class="col-8 bg-primary d-flex justify-content-center align-items-center">
            <p class="title">MAINTENANCE SYSTEM</p>
        </div>
        <div class="col-2 bg-success d-flex justify-content-center align-items-center">
            <p class="user">
                <?php
                session_start();
                if (isset($_SESSION['usermail'])) {
                    echo "$_SESSION[usermail]";
                } else {
                    Header("Location: login.php");
                }
                ?>
            </p>
        </div>
    </div>