
<div class="container vh-100 d-flex justify-content-center">
    <div class="form-container text-center">
        <h3 class="mb-5">COMPLETE DATOS DE LA SOLICITUD</h3>
        <div class="row">

            <form class="col-md-6 offset-md-3" action="index.php?action=cargar" method="POST">

            <select class="form-select" name="area" id="" required>
                    <option value="" disabled selected>Elija una opcion</option>

                        <?php 
                        require 'model/model_general.php';
                        $data = General::get_areas();

                        foreach($data as $d){
                            echo "
                            <option value='$d[0]'>$d[1]</option>
                            ";
                        }
                        ?>
                </select> <br>

                <input class="form-control" type="text" name="titulo" placeholder="Ingrese el tìtulo resumido" required> <br>

                <textarea class="form-control" name="detalles" id="" cols="30" rows="10" placeholder="Ingrese los detalles de la solicitud" required></textarea> <br>

                <button class="btn btn-success" name="action" value="cargar">Guardar</button>
            </form>
        </div>
    </div>
</div>