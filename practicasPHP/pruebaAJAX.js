
$(document).ready(function () {

    // AddEventListener ...
    document.getElementById('newUser').addEventListener('click', newUser)
 

    const form = document.getElementById('form');
    form.addEventListener('submit', hanndlerFormSubmit);

    document.querySelector('#close').addEventListener('click', () =>
        document.getElementById('formContainer').style.display = "none")

    getData()




    
    // -------------------------------------------------------------------- 
    // OBTENER DATOS DE LA LISTA DE USUARIOS 
    function getData() {
        $.ajax({
            type: "GET",
            url: "funciones.php",
            data: { 'action': 'load' },
            success: function (res) {
                const datos = JSON.parse(res)
                llenarTabla(datos)
            }
        })
    }
    
    
    
    // -------------------------------------------------------------------- 
    // PINTANDO LISTADO DE USUARIOS EN TABLA HTML
    function llenarTabla(obj) {
        let tabla = document.getElementById('tbody')
        tabla.innerHTML = ""
        for (data of obj) {
            tabla.innerHTML += `
            <tr>
            <td>${data.id}</td>
            <td>${data.usuario}</td>
            <td>${data.mail}</td>
            <td><button data-id="${data.id}" data-action="editar" class="btn btn-warning ">Editar</button></td>
            <td><button data-id="${data.id}" data-action="eliminar" class="btn btn-danger ">Eliminar</button></td>
            </tr>
            `
        }
    }
  
    
    // -------------------------------------------------------------------- 
    // ABRIR VENTANA NUEVO USUARIO + EDITAR  
    function newUser() {
        document.getElementById('formContainer').style.display = "flex";
        document.getElementById('button').innerText = "Nuevo"
        document.getElementById('userName').focus()
    }
    
    // MANEJANDO EL MISMO FORMULARIO SEGÚN NUEVO O EDITAR 
    function hanndlerFormSubmit(e){
        e.preventDefault()
        if(document.getElementById('button').innerText == "Nuevo"){
            loadUser()
        } else if(document.getElementById('button').innerText == "Modificar"){
            updateUser()
        }
    }
    // CARGANDO AL NUEVO USUARIO EN LA DDBB 
    function loadUser() {
        let user = document.getElementById('userName').value
        let mail = document.getElementById('userMail').value
        let data = { 'user': user, 'mail': mail, 'action':'insertNewUser' }

        $.ajax({
            type: "POST",
            url: "funciones.php",
            data: data,
            // dataType: "dataType",
            success: function (res) {
                alert('Registro ingresado correctamente')
                document.getElementById('userName').value = ""
                document.getElementById('userMail').value = ""
                document.getElementById('userName').focus()
            }
        })

        getData()
    }


    const table = document.getElementById('tabla')
    tabla.addEventListener('click', handleUsers)

    function handleUsers(e) {
        const action = e.target.dataset.action
        if (action === "editar") {
            cargarDatosinputUpdate()
         
        }
        else if (action === "eliminar") {
            deleteItem(e)
        }
    }

    // -------------------------------------------------------------------- 
    // EDITANDO USUARIOS     
    function updateUser() {
        let user = document.getElementById('userName').value
        let mail = document.getElementById('userMail').value
        let data = { 'user': user, 'mail': mail, 'action':'updateNewUser' }

        $.ajax({
            type: "POST",
            url: "funciones.php",
            data: data,
            // dataType: "dataType",
            success: function (res) {
                alert('Registro Modificado correctamente')
                document.getElementById('userName').value = ""
                document.getElementById('userMail').value = ""
                document.getElementById('formContainer').style.display = "none";

            }
        })

        getData()
    }

    // ELIMINANDO USUARIOS
    function cargarDatosinputUpdate(e) {

        const id = e.target.dataset.id
        $.ajax({
            type: "GET",
            url: "funciones.php",
            data: { 'action': 'getUser', 'id' : id },
            success: function (res) {

                const datos = JSON.parse(res)
                 document.getElementById('userName').value = datos.usuario
                document.getElementById('userMail').value = datos.mail
                document.getElementById('button').innerText = "Modificar"
                document.getElementById('formContainer').style.display = "flex"
            }
        })
    }


    function deleteItem(e) {
        const item = e.target.dataset.id
        $.ajax({
            type: 'POST',
            url: 'funciones.php',
            data: { 'action': 'delete', 'item': item },
            success: function (res) {
                if (res == 1) {
                    alert('Registro eliminado correctamente.')
                    getData()
                } else {
                    alert('Hubo algún problema durante la eliminación. Intente nuevamente')
                }
            }

        })
    }

    // -------------------------------------------------------------------- 



})

