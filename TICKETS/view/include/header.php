

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap e Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- estlos propios  -->
    <link rel="stylesheet" href="view/include/include.css">

    <title>Document</title>
</head>

<body>
    <header>
<div class="nav d-flex justify-content-between align-items-center bg-secondary text-light">
        <div>
            <h3>Mi Logo</h3>
        </div>
        <div>
            <H3>SISTEMA DE SOLICITUDES</H3>
        </div>
            <div class="d-flex flex-column justify-content-center align-items-center p-2">
         
                    <?php 
                        echo "User: $_SESSION[user_mail]";
                    ?> <br>
                    <a href="config/closeSession.php" class="btn btn-dark btn-sm">Close Session</a>
        
            </div>
</di>
    </header>




