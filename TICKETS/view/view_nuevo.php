
<?php 
if (isset($_POST['guardar'])){
    echo "<script>alert($_POST[titulo])</script>";
}
?>


<div class="container vh-100 d-flex justify-content-center">
    <div class="form-container text-center">
        <h3 class="mb-5">COMPLETE DATOS DE LA SOLICITUD</h3>
        <div class="row">
            <form class="col-md-6 offset-md-3" action="" method="POST">

            <select class="form-select" name="area" id="" required>
                    <option value="" disabled selected>Elija una opcion</option>
                    <option value="1">mantenimiento / servcios</option>
                    <option value="1">Electricidad / Acondic. de Aire</option>
                    <option value="1">Informatica / Soporte It</option>
                </select> <br>

                <input class="form-control" type="text" name="titulo" placeholder="Ingrese el tìtulo resumido" required> <br>

                <textarea class="form-control" name="detalles" id="" cols="30" rows="10" placeholder="Ingrese los detalles de la solicitud" required></textarea> <br>

                <button class="btn btn-success" name="action" value="guardar">Guardar</button>
            </form>
        </div>
    </div>
</div>