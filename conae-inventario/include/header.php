<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="./index.php">
            <img src="../img/conae.png">
            <img src="../img/veng.png">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a  href="index.php?action=principal" class="navbar-item" >
                Home
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Articulos
                </a>

                <div class="navbar-dropdown">

                    <a href="index.php?action=art_maestro" class="navbar-item">
                        Maestro
                    </a>
                    <hr class="navbar-divider">
                    <a href="index.php?action=art_alta" class="navbar-item">
                        Alta
                    </a>
                    <hr class="navbar-divider">
                    <a href="index.php?action=art_baja_modificaciones" class="navbar-item">
                        Baja- Modificaciones
                    </a>

                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Depositos
                </a>
                <div class="navbar-dropdown">

                    <a href="index.php?action=dep_maestro" class="navbar-item">
                        Maestro
                    </a>
                    <hr class="navbar-divider">
                    <a href="index.php?action=dep_alta" class="navbar-item">
                        Alta
                    </a>
                    <hr class="navbar-divider">
                    <a href="index.php?action=dep_baja_modificaciones" class="navbar-item">
                        Baja - Modificaciones
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Movimientos
                </a>
                <div class="navbar-dropdown">

                    <a class="navbar-item">
                        Ingreso de Materiales
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Egreso de Materiales
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Transferencias
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Ajustes
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Informes
                </a>
                <div class="navbar-dropdown">

                    <a class="navbar-item">
                        Informe de movimientos
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Informe de stock
                    </a>

                </div>
            </div>


        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">

                    <div class="d-flex text-center  mx-4">
                        <p><?php
                        echo $_SESSION['mail'] ?> 
                        </p>
                        <p> <img class="mx-2 rounded-circle" src="../img/usuario1.jpeg" alt="Usuario"  >    </p>
                    </div>

                    <a href="../sistema/logOut.php" class="button is-light">
                        Log Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
