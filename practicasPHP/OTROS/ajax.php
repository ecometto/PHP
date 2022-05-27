<?php
include "librerias.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .wrapper {
            width: 50%;
            background-color: silver;
            text-align: center
        }

        @media (max-width: 992px) {
            .wrapper {
                width: 100%;
                background-color: gray;
            }
        }
    </style>
    <title>Document</title>
</head>

<body>

    <div class="container p-3 mt-3 wrapper">

        <form id="formId" action="" method="post">
            Apellido <br>
            <input type="text" name="apellido" id="apellido"> <br><br>
            Nombre <br>
            <input type="text" name="nombre" id="nombre"> <br><br>
            Edad: <br>
            <input type="number" name="edad" id="edad"> <br> <br>

            <button type="submit" id="boton">Enviar</button>
        </form>

        <div id="contenido"></div>

    </div>

    <script>
        $(document).ready(function() {

            $('#boton').click(function(e) {
                e.preventDefault()
                data = $('#formId').serialize()
                $.ajax({
                    type: 'POST',
                    url: "ajax1.php",
                    data: data,
                    success: function(res) {
                        $('#contenido').html(res)
                    }
                })
            })

        })
    </script>

</body>

</html>