<?php

//VARIABLES Y TIPOS DE DATOS
$edad_minima = 18; //variable de tipo entero
$edad_maxima = 65; //variable de tipo entero
$nombre = "Edgardo"; //variable de tipo string
$altura = 1.82; //variable de tipo float
$casado = false; //variable de tipo boolean


//CONSTANTES
define("valorPI", 3.14159);
echo "el valor de pi es " . valorPI;
echo "<br> <br>";

//CONDIONAL IF/ELSE + OPERADORES COMPARACION (<, >, =, !=)+ OPERADORES LOGICOS (&&, ||)
if ($_POST) {
    echo "Se ha realizado un envio tipo POST <br>";

    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    if ($edad > $edad_maxima && $sexo == "M") {
        echo "Eres muy mayor y hombre. Ya pasaste los " . $edad . " años";
    } else if ($edad > $edad_minima && $sexo == "M") {
        echo "Eres mayor de edad y hombre. Tu edad es: " . $edad;
    } else {
        if ($sexo == "F") {
            echo "No eres mayor de edad. Eres de sexo FEMENINO";
        } else {
            echo "No eres mayor de edad. NO TIENE DEFINIDO EL SEXO";
        }
    }
}

if ($_GET) {
    $btn = $_GET['btn'];

    switch($btn){
        case "1":
            echo "presionaste el 1";
            break;
            case "2":
                echo "presionaste el 2";
                break;
            case "3":
                echo "presionaste el 3";
                break;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    echo "<br> <br>"
    ?>

    <form method="POST">
        Edad: <input type="text" name="edad"> <br>
        SEXO: <input type="text" name="sexo"> <br>
        <button type="submit" name="enviar">Enviar</button>
    </form>

</head>

<body>

    <form action="" method="GET">
        <button name="btn" value="1" >1</button>
        <button name="btn" value="2" >2</button>
        <button name="btn" value="3" >3</button>
    </form>

</body>

</html>