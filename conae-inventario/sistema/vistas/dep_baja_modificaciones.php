<?php
if (!isset($_SESSION['mail'])) {
    header("location: ../index.php");
}


function cargar_listado()
{
    include '../config/conexion.php';
    $sql = "SELECT * FROM depositos"; 
    $ejecutar = mysqli_query($conexion, $sql);
    while ($filas = mysqli_fetch_array($ejecutar)) {
        echo "
            <tr>
                <td>$filas[0]</td>
                <td>$filas[1]</td>
                <td>$filas[2]</td>
                <td><button id='$filas[0]' data-action='editar' class='btn btn-warning btn-sm'><a href='./index.php?action=dep_modificaciones&id=$filas[0]' style='text-decoration:none;'>Editar</a></button></td>
                <td><button id='$filas[0]' data-action='eliminar' class='btn btn-danger btn-sm'>Eliminar</button></td>
            </tr>";
    }
}


?>


<div class="container text-center">


    <h5>BAJA DE ARTICULOS</h5>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 10%; text-align: center;">ID</th>
                <th style="width: 30%; text-align: center;">NOMBRE</th>
                <th style="width: 50%; text-align: center;">ADICIONALES</th>
                <th style="width: 10%; text-align: center;">ACCIONES</th>

            </tr>
        </thead>
        <tbody id="tbody">

            <?php
            cargar_listado();
            ?>

        </tbody>
    </table>
</div>

<script src="../js/jquery-3.6.0.min.js"></script>
<script>
    var tabla = document.querySelector('.table');
    tabla.addEventListener('click', (e) => {

        var tbody = document.getElementById('tbody')

    if (e.target.dataset.action == "eliminar") {
            //confirmar
            var confirmar = confirm("esta seguro?")
            if (!confirmar) {
                return
            }

            //ajax para eliminar
            $.ajax({
                type: "POST",
                url: "../funciones/f_dep_baja.php",
                data: {
                    "art": e.target.id
                },
                success: function(response) {
                    tbody.innerHTML = response
                }
            });
        }

    })
</script>