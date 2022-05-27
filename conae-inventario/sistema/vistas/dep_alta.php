<div class="container text-center">

    <H4>FORMULARIO DE DEPOSITOS</H4>

    <div class="row m-4">
        <div class="bg-light col-md-6 offset-md-3 p-4" style="border-radius: 15px;">
            <form id="form" name="form" autocomplete="off">
                <input type="text" class="form-control my-2" name="nombre" id="nombre" placeholder="Ingrese Titulo del depósito">
                <input type="num" class="form-control my-2" name="adicionales" id="adicionales" placeholder="Ingrese descripcion adicional del depósito">
                <button type="submit" id="boton" class="btn btn-success">Cargar Deposito</button>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        document.getElementById('nombre').focus()

        let form = document.getElementById('form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            $.post(
                "../funciones/f_dep_alta.php", 
                $('#form').serialize(),
                function(res, ) {
                    console.log(res);
                    if(res == 1){ alert('Deposito ingresado corectamente');
                    }
                    form.reset()
                    nombre.focus()
                },
            );
        })

    });
</script>