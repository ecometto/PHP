<?php
$nombre = "";
$sexo = "";
$fishing = "";
$bicycling = "";
$singing = "";
$nacionalidad = "";

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'] == "f" ? "femenino" : "masculino";
    $fishing = isset($_POST['fishing']) ? $_POST['fishing'] : "";
    $bicycling = isset($_POST['bicycling']) ? $_POST['bicycling'] : "";
    $singing = isset($_POST['singing']) ? $_POST['singing'] : "";
    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : "";
    $archivo = isset($_FILES['archivo']['name'])?$_FILES['archivo']['name']:'';

    move_uploaded_file($_FILES['archivo']['tmp_name'],$_FILES['archivo']['name']);

    print_r($_FILES['archivo']);


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>formularios</title>

</head>

<body>
<div class="container mt-4">
    
    
        <form action="" enctype="multipart/form-data" method="POST">
            Nombre: <input type="text" name="nombre" value="<?php echo $nombre ?>"> <br>
            <br>
            sexo: <br>
            Femenino<input type="radio" name="sexo" value="f" <?php echo ($sexo == 'femenino' ? 'checked' : '') ?>> <br>
            Masculino<input type="radio" name="sexo" value="m" <?php echo ($sexo == 'masculino' ? 'checked' : '')  ?>> <br>
            <br>
            Hobbies: <br>
            <input type="checkbox" name="fishing" value="fishing" <?php echo ($fishing == 'fishing' ? 'checked' : '') ?>>Fishing <br>
            <input type="checkbox" name="bicycling" value="bicycling" <?php echo ($bicycling == 'bicycling' ? 'checked' : '') ?>>bicycling <br>
            <input type="checkbox" name="singing" value="singing" <?php echo ($singing == 'singing' ? 'checked' : '') ?>>Singing <br>
    
            <br>
            Nacionalidad:
            <select name="nacionalidad" id="">
                <option disabled value="">Selecciona una opcion</option>
                <option <?php echo ($nacionalidad == "argentino" ? 'selected' : '') ?> value="argentino">Argentino</option>
                <option <?php echo ($nacionalidad == "uruguayo" ? 'selected' : '') ?> value="uruguayo">Uruguayo</option>
                <option <?php echo ($nacionalidad == "brasilero" ? 'selected' : '') ?> value="brasilero">Brasilero</option>
                <option <?php echo ($nacionalidad == "paraguayo" ? 'selected' : '') ?> value="paraguayo">Paraguayo</option>
                <option <?php echo ($nacionalidad == "otros" ? 'selected' : '') ?> value="otros">Otros</option>
            </select> 
    
            <br>
            <input type="file" name="archivo" id="">

            <br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    
    
        <div class=" d-flex justify-content-center m-3 bg-secondary">
    
            <div class="w-50 bg-light text-center border m-3 p-3">
                <h3>datos de formulario</h3>
                <?php
                if (isset($_POST['enviar'])) {
                    echo "Nombre: $nombre.<br>
                    sexo: $sexo. <br>
                    Lo que te gusta es: $fishing $bicycling $singing. <br>
                    Tu nacionalidad es $nacionalidad. <br>
                    Nombre del archivo: $archivo
                    ";
                }
                ?>
            </div>
    
        </div>

</div>    
</body>

</html>