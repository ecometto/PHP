
<?php 
$saludo = "";

if(isset($_POST['saludar'])){
    $nombre =$_POST['nombre'];
    $saludo = "hola $nombre";

}

if(isset($_POST['despedir'])){
    $nombre =$_POST['nombre'];
    $saludo = "hasta la proxima $nombre";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>formulario de prueba</h1>

<form action="" method="post">
Nombre:
<input type="text" name="nombre" id=""><br>
<input type="submit" value="saludar" name="saludar"><br>
<input type="submit" value="Despedir" name="despedir">

</form>

<div>
    <h2> este es el saludo: <br> <?php echo "$saludo";?> </h2>
</div>

</body>
</html>