<<<<<<< HEAD
<?php 

if(isset($_POST['comprar'])){
    $id = openssl_decrypt($_POST['id'],COD, KEY,TRUE,IV);
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];

    echo $id

}

?>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "./configuracion/cdn_css.php" ?>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>

    <head>
        <?php require "./templates/footer.php";         ?>
    </head>

    <div class="container contenedor">
    <h1>carrito de compras.. aun sin estilos ni datos</h1>

    </div>


    <?php require "./templates/header.php";         ?>

    <?php require "./configuracion/cdn_js.php" ?>

</body>

</html>
>>>>>>> 838c3cd99489c4b2534aed2cae8408a1dfa0c790
