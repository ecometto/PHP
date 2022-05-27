<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    Nombre: <input type="text" id="nombre"> <br>
    Edad: <input type="number" name="" id="edad"> <br> <br>
    casado? <br>
    si: <input type="radio" name="casado" id="" class="casado" value="si"> <br>
    no: <input type="radio" name="casado" id="" class="casado" value="no" checked>

    <button id="boton">enviar</button>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#boton').click(function(e) {
                e.preventDefault();
                let nombre = $('#nombre').val();
                let edad = $('#edad').val();
                let casado = $('input[name="casado"]:checked').val();

                persona = {
                    nombre,
                    edad,
                    casado
                }

                resultado = JSON.parse(localStorage.getItem('personas')) ? 'true' : 'false?'
                console.log(resultado);

                data.push(persona)

                localStorage.setItem('personas', JSON.stringify(data))

                data = JSON.parse(localStorage.getItem('personas'))

                data.forEach(function(dato, clave) {
                    if (dato.nombre == "") {
                        data.shift(clave)
                    }
                    console.log('dato numero: ' + (clave + 1) + ' - ' + dato.nombre + '-' + dato.edad + '-' + dato.casado);
                })

                console.log(data);


            });
        });
    </script>
</body>

</html>