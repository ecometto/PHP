

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="main">
        <div class="chat-container">
            <h4>PERSONAL CHATBOT</h4>
            <div id="boxMsgs" class="chat-box">
                <div class="bot-msg">
                    Hola.. bienvenido. <br>
                    Ingrese su numero de telefono por favor: <br>
                    (este dato ya vendría?)
                </div>

            </div>
            <div class="form">
                <h5>Su texto aquí...</h5>
                <form id="form" action="">
                    <input type="text" name="userInput" id="userInput" placeholder="Escriba su mensaje aquí" autocomplete="off">
                    <button>Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var json = {
            $nombre: "",
            $nuevaCalle: "",
            $nuevaNumeracion: "",
            $nuevaCiudad: "",
            $direccionElegida: "",
            $confirmarNuevaDireccion: ""
        }
        var form = document.getElementById('form')
        form.addEventListener('submit', (e) => {
            e.preventDefault()
            procesarDatos()
        })
        async function procesarDatos() {
            let res = await fetch(`./index.php?procesando=${json}`)
            let respuesta = await res.json()
            console.log(respuesta)

        }
    </script>
</body>

</html>