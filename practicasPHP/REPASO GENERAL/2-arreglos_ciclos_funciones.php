<?php

// CICLOS 
// FOR , DO, WHILE

$hello = "";
$loops = "";


if ($_POST) {
    if (isset($_POST['forCicle'])) {
        $end = $_POST['end'];
        $loops .= "PRINTITNG FROM FOR LOOP <br>";
        for ($n = 0; $n < $end; $n = $n + 1) {
            $loops .= "El numero es $n <br>";
        }

    }
    if (isset($_POST['doCicle'])) {
        $n = 1;
        $end = $_POST['end'];
        $loops .= "PRINTITNG FROM DO LOOP <br>";
        do {
            $loops .= "primera fila si o si. fila: $n <br>";
            $n = $n + 1;
        } while ($n < $end);
    }
    if (isset($_POST['whileCicle'])) {
        $n = 0;
        $end = $_POST['end'];
        $loops .= "PRINTITNG FROM WHILE LOOP <br>";
        while ($n < $end) {
            $loops .= "$n <br>";
            $n = $n + 1;
        }
    }
    if (isset($_POST['hello'])) {
     $name = $_POST['name'];
     $age = $_POST['age'];
     if(is_numeric($age)){
        $hello = hello($name, $age);
     }else
     {$hello .= "Debe ingresar un numero valido";
    }
     
     
    }
}

// FUNCIONES
function hello($name, $edad)
{
    $saludo = "<br>Hola " . $name . "... <br>";
    if ($edad >= 18) {
        $saludo .= " Eres MAYOR de edad. Tienes: $edad <hr>";
    } else {
        echo "<br>";
        $saludo .= " Eres MENOR de edad. Tienes: $edad <hr>";
    }
    return $saludo;
}

echo "<h3>ARRAYS</h3>";
//ARRAYS INDEXADOS (comunes)
$frutas = ["manzana","banana","pera"];

foreach($frutas as $cada){
    echo $cada ."<br>";
}
for($n=0; $n<=count($frutas)-1;$n++){
    echo "Posicion $n - $frutas[$n] <br>";
}

//ARRAY ASOCIATIVO (Similar a objeto JS o diccionario PY)
$persona = [
    "nombre" => "Edgardo",
    "edad" => 44,
    "direcciones" => "Paso de los Andes 897"
];

echo "<br>";
foreach($persona as $clave=>$valor){
    echo "El indice <b>'$clave'</b> tiene un valor de: --> $valor <br>";
}

$data = [
    [   "marca"=>"Fiat",
        "modelo"=>"Duna",
        "color"=>"Rojo"    
    ],
    [   "marca"=>"Renault",
        "modelo"=>"Logan",
        "color"=>"Gris"    
    ],
    [   "marca"=>"Ford",
        "modelo"=>"Fiesta",
        "color"=>"Negro"    
    ]
];
echo "<br><br>";
echo "ARRAY SIN MODIFICAR<br>";
echo "el array tiene " .count($data) . " items.<br>";
foreach($data as $auto){
    echo "hola " .$auto['marca'] ." " .$auto['modelo'] ." de color " .$auto['color'] ."<br>";
}

// funciones de array: array_pop, array_push, array_shift
array_shift($data);
array_unshift($data,  [   "marca"=>"Ford",
"modelo"=>"Fiesta Kinetic",
"color"=>"Blanco"    
]);
array_push($data,     [   "marca"=>"Fiat",
"modelo"=>"Strada",
"color"=>"gris oscuro"    
]);

array_splice($data, 0, 1);

echo "<br><br>";
echo "ARRAY CON MODIFICACIONES <br> ";
echo "el array tiene " .count($data) . " items.<br>";
foreach($data as $auto){
    echo "hola " .$auto['marca'] ." " .$auto['modelo'] ." de color " .$auto['color'] ."<br>";
}


echo "<hr>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h3>FECHA Y HORA</h3>
<?php 
// la funcion date() devuelve la fecha y horas actual.
// la funcion time() devuelve la cantidad de segundos desde 01/01/1970 hasta ahora.

    $date = date("Y/m/d");
    $time = date("H:i:s");
    echo "$date T $time <br>";


?>
    <h3>insert number to repeat</h3>
    <form action="" method="POST">
        <input type="text" name="end" value=<?php $end = rand(1,10); echo "$end"; ?> > <br>
        <button name="forCicle" value="10">for cicle</button> <br>
        <button name="doCicle" value="10">Do Cicle</button> <br>
        <button name="whileCicle" value="10">While</button> <br>
    </form>

    <hr>
    <h3>insert your DATA</h3>
    <form action="" method="POST">
        Name: <input type="text" name="name"> <br>
        Age: <input type="text" name="age" value=<?php $end = rand(10,65); echo "$end"; ?>> <br>
        <button name="hello">say hello</button> <br>
    </form>

    <hr>
    <h2>RESPONSE</h2>
    <?php echo $hello;?>
    <?php echo $loops;?>

</body>

</html>