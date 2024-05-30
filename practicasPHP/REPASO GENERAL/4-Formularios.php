<?php 

if($_POST){
    if(isset($_POST['name']) && $_POST['name'] !== ""){
        echo "El nombre ingrsado es: $_POST[name]";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="POST">
    <input type="text" name="name"> <br> <br>

    <input type="radio" name="sex" value="M"> M <br>
    <input type="radio" name="sex" value="F"> F <br> <br>

    <input type="checkbox" name="sports" > Sports <br>
    <input type="checkbox" name="music" > Music <br>
    <input type="checkbox" name="dance" > Dance <br>
    <input type="checkbox" name="tech"> Tech <br>

    <input type="submit" value="ENVIAR">


</form>
</body>
</html>