<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Chatbot</title>
</head>

<body>

    <div class="main">
        <div class="chat-container">
            <h4>PERSONAL CHATBOT</h4>
            <div id="boxMsgs" class="chat-box">
                <!-- <div class="bot-msg">
                    Hola.. bienvenido. <br>
                    Ingresa '1' para iniciar el chat..
                </div> -->

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




    <!-- ---------------------------- JACVASCRIPT ------------------------- -->
    <script>
        var campo = ""
        var input = document.getElementById('userInput')
        var form = document.getElementById('form')
        var datos = {
            primerMensaje: true,
            nombre: "",
            nuevaCalle: "",
            nuevaNumeracion: "",
            nuevaCiudad: "",
            confirmarNuevaDireccion: "",
            direccionElegida: "",
            confirmacionDireccionElegida: "",
            salir: true
        }

        form.addEventListener('submit', (e) => {
            e.preventDefault()
            var userInput = input.value

            agregarMensaje(userInput, 'user')
            actualizaJsonparaPost(userInput)
            procesarDatos()



        })


        // ---------------- FUNCIONES ------------------- 
        // funcion para agregar mensajes al chat. Pueden ser mensajes del user o del bot
        function agregarMensaje(mensaje, user) {
            let elemento = document.createElement('div')
            let elementoHTML = `<div class="${user}-msg">
            ${mensaje}
            </div>`
            elemento.innerHTML = elementoHTML
            boxMsgs.appendChild(elemento)
            boxMsgs.scrollTop = boxMsgs.scrollHeight;
        }


        function actualizaJsonparaPost(userInput) {
            // console.log(campo)
            
            campo == "ingresar" ? (
                datos.nombre = userInput,
                datos.salir = false,
                datos.direccionElegida = "") : null
            
            campo == "nombre" ? datos.nombre = userInput.toUpperCase() : null
            
            campo == "pedirDireccion" ? ( datos.nuevaCalle = userInput.toUpperCase(),
            datos.nuevaNumeracion = "",
            datos.nuevaCiudad = "",
            datos.confirmarNuevaDireccion = ""
            )
             : null
            
            campo == "pedirAltura" ? datos.nuevaNumeracion = userInput : null
            
            campo == "pedirCiudad" ? datos.nuevaCiudad = userInput.toUpperCase() : null
            
            campo == "confirmarNuevaDireccion" ? (datos.confirmarNuevaDireccion = userInput) : null
            
            campo == "direccionElegida" ? (datos.direccionElegida = userInput,
                // datos.primerMensaje = false,
                datos.nuevaCalle = "",
                datos.nuevaNumeracion = "",
                datos.nuevaCiudad ="") : null,
                datos.confirmacionDireccionElegida = ""
            
            campo == "confirmarDireccionElegida" ? datos.confirmacionDireccionElegida = userInput : null
            
            campo == "salir" ? (datos.salir = true,
                datos.direccionElegida = "",
                datos.primerMensaje = true) : null

        }



        // Envia datos JSON al servidor para procesar y obtener respuesta.
        // Luego procesa la respuesta (procesarRespuesta()) para responderle al cliente 
        async function procesarDatos() {
            fetch('back.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(datos)
                })
                .then(res => {
                    console.log(res)
                    let resp = res.json()
                        .then(resp => {
                            console.log(resp)
                            setTimeout(() => {
                                respuestaBot(resp)
                            })

                        })

                    input.value = ""
                    input.focus()

                })
        }

        function respuestaBot(respuesta) {
            let texto = respuesta.texto
            campo = respuesta.campo
            agregarMensaje(texto, "bot")
            if (campo == "asignarMovil") {
                setTimeout(() => {
                    agregarMensaje("Movil asignado con exito. <br>La demora aproximada es de 12 minutos", "bot");
                    setTimeout(()=>{
                        datos.salir = true
                        datos.confirmacionDireccionElegida=""
                        datos.direccionElegida = ""
                        datos.primerMensaje = true 
                        procesarDatos()
                    }, 2000)
                }, 3000)


            }
        }

        procesarDatos()
        input.value = ""
        input.focus()


        // }
    </script>
</body>

</html>