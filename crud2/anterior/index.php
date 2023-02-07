<?php
include './listar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- leaflet  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD2</title>
</head>

<body>
    <div class="container">

        <section>
            <h1 class="m-4 text-center">NUEVO CRUD FOR PRACTICE</h1>

            <div class="row">
                <div class="col-4 p-2">
                    <h3> formulario de ingreso</h3>
                    <form action="guardar.php" method="POST">
                        nombre: <input class="form-control" name="name" id="name" type="text"> <br>
                        mail: <input class="form-control" name="mail" type="text"> <br>
                        <button class="btn btn-success">Registrar</button> <br>
                    </form>

                </div>
                <div class="col-8">
                    <h3>Tabla de contactos</h3>
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>nombre</th>
                                <th>email</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($res as $contact) {
                                echo "    <tr>
                                            <td> $contact[id] </td>
                                            <td> $contact[name] </td>
                                            <td> $contact[mail] </td>
                                            <td>
                                               <a href='editando.php?id=$contact[id]' class='btn btn-warning'> Edit </a>
                                               <a href='eliminar.php?id=$contact[id]' class='btn btn-danger' onclick='return confirm(\"are you sure\")'> Delete </a>
                                            </td>
                                        </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <section>
            <h1 class="m-4 text-center">MAPAS  <br>(click para conecer Latitud y longitud en algun punto)</h1>
            <div class="map-container" id="map-container">
                <div id="map">

                </div>
            </div>
        </section>

        <footer>
            Powered by leaflet and CEDCorp
        </footer>

    </div>


    <!-- leaflet  -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.getElementById('name').focus()

        function confirmar() {
            res = confirm("esta seguro");
            return res
        }

        var map = L.map('map').setView([51.5008414320916, -0.03694822030978648], 12);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright"></a>'
        }).addTo(map);

        // adding a marker 
        var marker = L.marker([51.480392989803626, -0.008109110403186634]).addTo(map)

        // adding a circle
        var circle = L.circle([51.50513645210682, -0.07608191354185637], {
            color: 'green',
            fillColor: 'red',
            fillOpacity: 0.3,
            radius: 1000
        }).addTo(map);

        // adding a poligon 
        var polygon = L.polygon([
            [51.50941077587324, 0.04006228409844201],
            [51.508191116638855, 0.0702103501809962],
            [51.50030945448506, 0.06794924522480462],
            [51.502561497064846, 0.03930858244637815]
        ], {
            fillColor: 'blue',
            fillOpacity: 0.5
        }).addTo(map);

        // adding POPS UP to the elementos (marker, circle and polygon)
        marker.bindPopup("<b>Greenwich Park</b>"); //openPopup hace que esté activado por defecto (solo uno permite)
        circle.bindPopup("London Tower Bridge").openPopup();
        polygon.bindPopup("London Airport");

        //Adding a "stand alone" popup (solamente un popup, al cargar la pagina (no usa addTo sino openOn))
        // var popupSA = L.popup()
        //     .setLatLng([51.513, -0.09])
        //     .setContent("I am a standalone popup.")
        //     .openOn(map);

        // adding actions for events (in this case for click)
        var popupCoord = L.popup();

        function onMapClick(e) {
            popupCoord
                .setLatLng(e.latlng)
                .setContent("Latitud: " + e.latlng.lat.toString() + "<br> Longitud: " +e.latlng.lng.toString() )
                .openOn(map);
                console.log(e.latlng)
        }

        map.on('click', onMapClick);
    </script>
</body>

</html>