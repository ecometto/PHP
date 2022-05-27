<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form id="form" method="POST">
        especie: <input type="text" name="especie" id="especie"> <br>
        patas: <input type="text" name="patas" id="patas">
        <button type="submit" id="boton" name="boton">enviar</button> <br>
    </form>

    <div id="contenedor">

    </div>

<!-- JQUERY  -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
       $(document).ready(function(){

           $('#boton').click(function (e) { 
               e.preventDefault();
               var datos = $('#form').serialize()
            //    alert(datos)
            //    return false

               $.ajax({
                    type: "POST",
                   url: "prueba1.php",
                   data: datos,
                   success: function(res){
                       $('#contenedor').html(res);
                   }
               })        
           });


       })
    </script>
</body>

</html>