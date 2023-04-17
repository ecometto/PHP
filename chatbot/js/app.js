const form = document.getElementById('form')
const userInput = document.getElementById('userInput')
const boxMsgs = document.getElementById('boxMsgs')
var logueado = false
var buscandoOperadora = false
userInput.focus()

form.addEventListener('submit', (e) => {
    e.preventDefault()
    var input = userInput.value
    if (!logueado) {
        showUserMsg(input)
        login(input)
    } else {
        showUserMsg(input)
        getAnswer(input)
    }

    userInput.value = ""
    userInput.focus()

})




// FUNCTIONS -----------------
function agregarMensaje(mensaje) {
    let elemento = document.createElement('div')
    let elementoHTML = `<div class="bot-msg">
                        ${mensaje}
                        </div>`
    elemento.innerHTML = elementoHTML
    boxMsgs.appendChild(elemento)
    boxMsgs.scrollTop = boxMsgs.scrollHeight;
}


async function login(celular) {
    let res = await fetch(`./res.php?login=${celular}`)
    let data = await res.json()

    if (data == "errorUsuario") {
        let mensaje = "Lo siento, el número ingresado no pertenece a un cliente. <br>  Intentalo nuevamente."
        agregarMensaje(mensaje)
    } else {
        let mensaje = `Bienvenido ${data.nombres} ${data.apellido}. <br> Quieres que te enviemos un movil a ${data.direcciones} <br>  1- SI <br> 2- NO, contactarme con la operadora`
        agregarMensaje(mensaje)
        logueado = true
    }
}


function showUserMsg(userMsg) {
    let elemento = document.createElement('div')
    let elementoHTML = `<div class="user-msg">
                        ${userMsg}
                        </div>`
    elemento.innerHTML = elementoHTML
    boxMsgs.appendChild(elemento)
}


async function getAnswer(userMsg) {
    let res = await fetch(`./res.php?pregunta=${userMsg}`)
    let data = await res.json()

    setTimeout(() => {
        if (data == "errorRespuesta") {
            let mensaje = "Lo siento. No entiendo tu pregunta. Intenta cambiando la palabra clave."
            agregarMensaje(mensaje)
           
        } else if (data == "buscandoMovil") {
            let mensaje = "Estamos buscando el móvil más cercano. <br>Aguarde por favor."
            agregarMensaje(mensaje)
            setTimeout(()=>{
                agregarMensaje("Movil asignado. En breve llegaremos a destino")
            },5000)
            
        } else if (data == "conectarOperadora") {
            let mensaje = "Redirigiendo a la operadora... <br>Aguarde por favor"
            agregarMensaje(mensaje)
            userInput.setAttribute('disabled', true)

        } else {
            let mensaje = data.respuesta    
            agregarMensaje(mensaje)    
        }
    }, 500)

}