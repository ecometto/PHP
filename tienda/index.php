<?php
require './configuracion/conexion.php';

$sql = "select * from productos";
$res = mysqli_query($conexion, $sql);

if (isset($_POST['comprar'])) {

    echo openssl_decrypt('holaFDSFDS1', COD, KEY);
}

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
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <header class="">
        <?php include "./templates/header.php";
        ?>
    </header>



    <div class="container contenedor mb-5">
        <main class="row">

            <?php while ($fila = mysqli_fetch_array($res)) { ?>
                <div class="col-md-3">
                    <div>
                        <div class="card-img"><img class="card-img-top img-fluid " src="<?php echo $fila['imagen']; ?>" alt=""></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fila['nombre']; ?></h5>
                            <h5 class="card-title"><?php echo $fila['precio']; ?></h5>
                            <p class=" desc card-text"><?php echo $fila['descripcion']; ?> <br>
                            <p title="Ver Mas" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="bottom" data-bs-content="<?php echo $fila['descripcion']; ?>">
                                leer mas...
                            </p>
                        </div>
                        <form action="carrito.php" method="POST">
                            <input type="hidden" name="id" id="id" value=" <?php echo openssl_encrypt($fila['id'], COD, KEY, OPTION, IV); ?>">
                            <input type="hidden" name="nombre" id="nombre" value=" <?php echo openssl_encrypt($fila['nombre'], COD, KEY, OPTION, IV); ?>">
                            <input type="hidden" name="precio" id="precio" value=" <?php echo openssl_encrypt($fila['precio'], COD, KEY, OPTION, IV); ?>">
                            <input type="hidden" name="descripcion" id="descripcion" value=" <?php echo openssl_encrypt($fila['descripcion'], COD, KEY, OPTION, IV); ?>">

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success " name="comprar">Comprar</button>
                            </div>

                        </form>
                    </div>

                </div>
            <?php } ?>
        </main>
    </div>

    <footer>
        <?php include "./templates/footer.php";   ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        // SI O SI SE DEBE INCLUIR ESTAS DOS LINEAS PARA EL POPOVER.. SI NO, NO FUNCIONA
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>

</html>