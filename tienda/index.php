<?php
require "./configuracion/conexion.php";
require "./configuracion/datos.php";

$sql = "select * from productos";
$ejecutar = mysqli_query($conexion, $sql);

?>

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

    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>

<body>
    <header class="">
        <?php include "./templates/header.php";   ?>
    </header>

    <div class="container contenedor">
        <main class="row">

            <?php
            foreach ($ejecutar as $fila) {   ?>

                <div class="col-md-3 my-2">
                    <div class="bg-light py-2">
                        <div class="card-img ">
                            <img class="card-img-top" src="<?php echo $fila['imagen'] ?>" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?php echo $fila['nombre'] ?></h5>
                            <h4><?php echo $fila['precio'] ?></h4>
                            <p class="card-text"> <?php echo $fila['descripcion'] ?> </p>
                        </div>
                        <form action="" method="POST">

                            <div class="conte_data">
                                <!--style="display:none;" -->
                                <input type="text" name="id" id="id" value="<?php echo openssl_encrypt($fila['id'] , COD, KEY)?>">
                                <input type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($fila['nombre'] , COD, KEY)?>">
                                <input type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($fila['precio'] , COD, KEY)?>">
                                <input type="text" name="descripcion" id="descripcion" value="<?php echo openssl_encrypt($fila['descripcion'] , COD, KEY)?>">
                                <input type="text" name="cant" id="cant" value="<?php echo openssl_encrypt('1' , COD, KEY)?>">
                            </div>

                            <button type="submit" class="btn btn-success col-md-8 offset-md-2">Comprar</button>

                        </form>
                    </div>

                </div>

            <?php  }    ?>


            


        </main>

    </div>

    <footer>
        <?php include "./templates/footer.php";   ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>