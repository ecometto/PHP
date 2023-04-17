<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="float-left">
                <a class="navbar-brand" href="index.php?seccion=home">
                    <img src="static/img/libro1.jpg" alt="icono" width="80px" height="60px">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse text-center justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <h3>SISTEMA DE INVENTARIO</h3>
                    <!-- <a class="nav-link active" aria-current="page" href="index.php?seccion=home">Home</a>
                        <a class="nav-link" href="index.php?seccion=about">About</a>
                        <a class="nav-link" href="index.php?seccion=contact">Contact</a> -->
                </div>
            </div>

            <div class="mx-4 ps-4 text-center">
                <?php echo $_SESSION['user'] ?> <br>
                <a href="closeSession.php">Close</a>
            </div>
        </div>


        </div>
    </nav>
</header>