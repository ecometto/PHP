<?php
include 'BACK/data.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- BOOTSTRAP  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- LEAFLET  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #map {
            height: 480px;
            background-color: gray;
            margin: 20px 0px;
        }
    </style>
</head>

<body>
    <div class="container" id="info">
        <section>
            <div id="map">

            </div>
        </section>
        <section>
            <h3 class="text-center">LISTADO DE MOVIMIENTOS</h3>

            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>vehiculo</th>
                        <th>fecha</th>
                        <th>latitud</th>
                        <th>longitud</th>
                        <th>acciones</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($data as $dato) {
                        echo "<tr>
                    <td> $dato[id_vehiculo]</td> 
                    <td> $dato[fecha]</td> 
                    <td> $dato[lat]</td> 
                    <td> $dato[lng]</td> 
                    <td>
                        <button class='btn btn-primary' id='$dato[id_mov]'> Ver en mapa </button>
                    </td> 
                </tr>";
                    }

                    ?>

                </tbody>
            </table>
        </section>
    </div>


    <!-- LEAFLET  -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!-- JQUERY  -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('load', () => {
            lat = -31.41;
            lng = -64.186;

            // CARGANDO MAPA 
            var map = L.map('map').setView([lat, lng], 12);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            mark = L.marker([lat, lng]).addTo(map)


            botones = document.querySelectorAll('.btn');
            for (boton of botones) {
                boton.addEventListener('click', (e) => {
                    let id = e.target.id;
                    $.ajax({
                        type: "GET",
                        url: "BACK/data_id.php",
                        data: {
                            id: id
                        },
                        success: function(response) {
                            let res = JSON.parse(response);
                            lat = res[0].lat;
                            lng = res[0].lng;
                            mark.remove()
                            mark = L.marker([lat, lng]).addTo(map)

                            // L.marker([lat, lng]).addTo(map).openPopup()
                                                       

                              
                        }
                    });
                })
            }




        })
    </script>
</body>

</html>