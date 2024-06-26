

<?php
include 'includes/header.php';
?>

<div class="container">

    <!-- acá renderizará la página, según el dato de la URI (Rutas amigables, configurado en htaccess) -->
    <?php 
        if (isset($_GET['Pages'])){

            include 'Pages/'.$_GET['Pages'] .".php";
        }
    ?>

</div>


<?php
include 'includes/footer.php';

?>