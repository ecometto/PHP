<div class="container text-center">

    <H4>FORMULARIO DE ARTICULOS</H4>

    <div class="row m-4">
        <div class="bg-light col-md-6 offset-md-3 p-4" style="border-radius: 15px;">
            <form id="form" name="form" autocomplete="off">
                <input type="text" class="form-control my-2" name="nombre" id="nombre" placeholder="Ingrese nombre del producto">

                <textarea name="adicional" id="adicional" class="form-control" cols="30" rows="5" placeholder="ingrese detalles adicionales" maxlength="500"></textarea>
                

                <p style="text-align:end;">Caracteres restantes: <span class="fw-bold restantes">500</span></p>

                <select class="form-select my-2" name="categoria" id="categoria" maxlength="50">
                    <option value="" selected disabled>Seleccione la categoria</option>

                    <?php
                    // cargarndo select con datos
                    $sql = "select * from categorias";
                    $ejecutar = mysqli_query($conexion, $sql);
                    $resultado = mysqli_fetch_all($ejecutar);
                    foreach ($resultado as $categoria) {
                        echo "<option value='$categoria[0]'>$categoria[1]</option>";
                    } ?>
                </select>

                <input type="num" class="form-control my-2" name="stock" id="stock" placeholder="Ingrese stock inicial">

                <button type="submit" id="boton" class="btn btn-success">Cargar Item</button>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        document.getElementById('nombre').focus()
        var res = document.querySelector('.restantes')

        document.getElementById('adicional').addEventListener('keyup', function(e) {
            let texto = e.target.textLength
            let restantes = (499 - texto)
            res.textContent = restantes;
        })

        let form = document.getElementById('form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // var nombre = document.getElementById('nombre')
            // var adicional = document.getElementById('adicional')
            // var categoria = document.getElementById('categoria')
            // var stock = document.getElementById('stock')
            // var form = document.getElementById('form')
         
            $.post(
                "../funciones/f_art_alta.php", 
                $('#form').serialize(),
                // {                    
                //     "nombre" : nombre.value,
                //     "adicional" :adicional.value,
                //     "categoria" :categoria.value, 
                //     "stock" :stock.value
                // },
                function(res, ) {
                    console.log(res);
                    if(res == 1){ alert('Articulo ingresado corectamente');
                    }
                    form.reset()
                    nombre.focus()
                },
            );
        })

    });
</script>