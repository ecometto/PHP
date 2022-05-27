<?php
session_start();
if (!isset($_SESSION['user_mail'])) {
    echo "<script>location = '../index.php'</script>";
}

include "../../../conexion.php";

if(isset($_POST['btn_solicitud'])){
    $solicitud = $_POST['sol_descripcion'];
    $referencia = $_POST['sol_OTref'];
    $fecha = $_POST['sol_fecha_nec'];
    $prioridad = $_POST['sol_prioridad'];
    $solicitante_id = $_SESSION['id'];

    $sql = "call ingreso_solicitudes('$solicitud', '$referencia', '$fecha', '$prioridad', $solicitante_id)";
    $ejecutar = mysqli_query ($conexion, $sql);
    
   if($ejecutar){
      echo "<script>alert('registro ingresado correctamente')</script>";
   } else{
    echo "<script>alert('hubo algun error durante la carga')</script>";   
   }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <style>
    .form-container {
        min-width: 800px;
        height: 800px;
    }
    </style>

    <title>Ingreso Solicitudes</title>
</head>

<body>
    <header class="sticky-top">
        <?php include '../../vistas/header.php';  ?>
    </header>

    <div class="container-fluid">
        <h3 class="text-center my-2"> FORMULARIO DE INGRESO DE SOLICITUDES</h3>
        <div class=" d-flex align-items-center justify-content-center flex-column mt-2">
            <div class="form-container">
                <div class="bg-light p-3">
                    <form id="formulario" action="" method="POST">
                        <div class="row"> 
                            <div class="mb-3 d-flex">
                                Descripcion: <input class="mx-2 form-control" type="text" id="sol_descripcion"
                                    name="sol_descripcion" required
                                    placeholder="Ingrese objeto y/o descripcion de materiales" autocomplete="off">

                            </div>
                            <div class="mb-3 d-flex">
                                Num.OT/Referencia: <input class="mx-2 form-control" type="text" id="sol_OTref" name="sol_OTref" required
                                                    placeholder="Ingrese numero de OT, o alguna referencia" autocomplete="off">
                            </div>
                            <div class="d-flex justify-content-around">
                                <div class="mb-3">
                                    <label for="sol_fecha_nec">Fecha Necesidad</label>
                                    <input class="form-control" type="date" id="sol_fecha_nec" name="sol_fecha_nec"
                                        required placeholder="Ingrese objeto y/o tipo de materiales">
                                </div>
                                <div class="mb-3">
                                    <label for="sol_prioridad">Prioridad</label>
                                    <select class="form-select" name="sol_prioridad" id="sol_prioridad">
                                        <option value="alta">Alta</option>
                                        <option value="media">Media</option>
                                        <option value="baja">Baja</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="border p-3">
                            <div>
                                <h5>DETALLE DE PRODUCTOS SOLICITADOS</h5>
                                <div class="d-flex row">
                                    <div class="col-6">
                                        Producto:<br>
                                        <select class="form-select " name="" id="producto">
                                            <option value="" selected disabled>Seleccione una opcion</option>
                                                <?php 
                                                $sql = "select prod_id, prod_descripcion from productos";
                                                $ejecutar = mysqli_query($conexion, $sql);
                                                while ($fila = mysqli_fetch_array($ejecutar)){
                                                    echo "<option value='$fila[0]'>$fila[1]</option>";
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        Umedida: <br>
                                        <input class="form-control primary " type="text" name="" id="umedida" readonly>
                                    </div>
                                    <div class="col-2">
                                        cantidad: <br>
                                        <input class="form-control " type="number" name="" id="">
                                    </div>
                                    <div class="col-2 d-flex align-items-end ">
                                        <button class="btn btn-success py-2 px-4 " id="agregarFila">
                                            click
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>producto</th>
                                            <th>cantidad</th>
                                            <th>Umedida</th>
                                            <th>Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>producto1</td>
                                            <td>10</td>
                                            <td>unidad</td>
                                            <td>Ninguna observacion</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>




                        <div class="text-center">
                            <button class="btn btn-success " id="btn_solicitud" name="btn_solicitud">Enviar
                                Solicitud</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <?php include '../../vistas/footer.php';
        ?>
    </footer>




    <!-- datatables responsive  -->
    <script src="../../js/jquery.min.js"></script>

    <script>
    $(document).ready(function() {

        $('#producto').change(function (e) { 
            e.preventDefault();
            let prodId = $('#producto').val();
            $.ajax({
                type: "post",
                url: "../../modelo/buscarUmedida.php",
                data: {"producto": prodId},
                success: function (response) {
                    $('#umedida').val(response);
                }
            });
            
        });

        $('#agregarFila').click(function (e) { 
            e.preventDefault();
            alert('falta cargar en la lista (idea, hacerlo en un array de objetos')
            
        });
        // $('#formulario').submit(function(e) {
        //     e.preventDefault();

        //     console.log('fff');

        //     var datos = $('#formulario').serialize()
        //     console.log(datos);
        //     $.post(
        //         "../../modelo/cargar_solicitud.php",
        //         "data": datos,
        //     );

        //     function(response) {
        //         console.log(response);
        //     }

        // });



    });
    </script>


</body>

</html>