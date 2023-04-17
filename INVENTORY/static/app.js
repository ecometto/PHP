var btnAlta = document.querySelector(".buton-alta")
var formContainer = document.querySelector(".form-container-alta")



// ADD EVENT LISTENERS 
btnAlta.addEventListener('click', (e) => {
    if (formContainer.style.display == "none" || formContainer.style.display == "") {
        formContainer.style.display = "block"
        btnAlta.innerHTML = "Ocultar"
    } else if (formContainer.style.display == "block"){
        formContainer.style.display = "none"
        btnAlta.innerHTML = "Nuevo"
    }
    console.log(formContainer.style.display)
})