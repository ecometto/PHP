<?php
// PRUEBAS EMPTY  ---------------------
// $variable = "algo";
// if(!empty($variable)){
//     echo "la variable tiene contenido";
// }else{
//     echo "la variable está vacia";
// }

// // PRUEBAS ISSET  ---------------------
// $variable = $_GET['var'];
// if(isset($_GET['var'])){
//     echo<<< HTML
//     La variable existe.
//     Su nombre es $variable
//     HTML;
// } else {
//     echo "la variable no existe";
// }


// // PRUEBAS SELECT MULTIPLE Y CHECKBOX  ------------------
// if(!isset($_POST) || empty($_POST)){
//     echo "no se envió nada";
// }else{
//     echo "algo enviado ??";
// }
// var_dump($_POST);

// if (isset($_POST['cat'])) {
//     var_dump($_POST['cat']);
//     echo "<br><br> -----------------<br>";

//     echo "los hobbies son: <br>";
//     if (isset($_POST['hobbie'])){ 
//         var_dump($_POST['hobbie']);
//     }else{
//         echo "no hay hobbies seleccionados";
//     }
// }
// $clave = "123456";
// $encripted = password_hash($clave, PASSWORD_DEFAULT);
// $decripted = password_verify("123456", $encripted);
// if($decripted){
//     $mensaje= "clave correcta";
// }else{
//     $mensaje = "clave equivocada. intente otra vez";
// }
// echo<<< HTML
// <br><br>
// ---------------------------------- <br>
// $encripted <br>
// --------------------------------
// <br><br>
// $mensaje <br><br>
// HTML;

use Conexion as GlobalConexion;

?>

<!-- PRUEBAS SELECT MULTIPLE Y CHECKBOX  ------------------ -->
<!-- <form action="" method="POST">
    <select name="cat[]" id=""  multiple>
        <option value="1">uno</option>
        <option value="2">dos</option>
        <option value="3">tres</option>
        <option value="4">cuatro</option>
        <option value="5">cinco</option>
    </select>
    <br>
    <br>
    hobbies: <br>
    <label for="">
        <input type="checkbox" value="pescar" name="hobbie[]" id="">Pescar
    </label>
    <label for="">
        <input type="checkbox" value="bailar" name="hobbie[]" id="">bailar
    </label>
    <label for="">
        <input type="checkbox" value="volar" name="hobbie[]" id="">volar
    </label>
    <button type="submit">enviar</button>
</form> -->

<!-- NUEVAS PRUEBAS  -->
<!-- -------------------------------------------------------------------------------------------------------  -->


<?php

echo "<br>";
echo "<hr>";

if (isset($_POST)) {
    // evaluando categorias...
    if (!isset($_POST['categorias'])) {
        echo "no hay datos para mostrar de categorias";
    } else {
        echo "categorías: <br>";
        // var_dump($_POST['categorias']); 
        $categorias = $_POST['categorias'];
        foreach ($categorias as $cat) {
            echo $cat . "<br>";
        }
    }

    echo "<hr>";
    // evaluando hobbies... 
    if (!isset($_POST['hobbies'])) {
        echo "no hay hobbies para mostrar";
        echo "<hr>";
    } else {
        echo "hobbies:<br>";
        // var_dump($_POST['hobbies']); 
        $hobbies = $_POST['hobbies'];
        foreach ($hobbies as $hobby) {
            echo $hobby . "<br>";
        }
    }
}

echo "------------------------------<br>";
$array = ["juan", "pedro", 44, true];
foreach ($array as $cada) {
    echo $cada;
    echo "<br>";
}

$arrayAssoc = [["nombre" => "juan", "edad" => 10], ["nombre" => "pedro", "edad" => 20], ["nombre" => "maria", "edad" => 30]];
foreach ($arrayAssoc as $person) {
    echo "Nombre: " . $person['nombre'] . " - Edad: " . $person['edad'] . "<br>";
}

$myObject = '{
    "nombre":"UnNombre",
    "apellido":"unApellido"
}';
var_dump(json_decode($myObject));
echo "<br>";

$user = new stdClass;
$user->name = "Roberto Ricardo";
$user->apellido = "Rivarola";
echo $user->name . " " . $user->apellido . "<br>";

echo "-------------------------------------------<br>";
class Alumno
{
    public $legajo;
    public $nombre;
    public $apellido;

    public function mostrar()
    {
        echo "Alumno $this->apellido, $this->nombre con número de legajo $this->legajo";
    }
}

$jor = new Alumno();
$jor->legajo = "4321";
$jor->nombre = "Jnombre";
$jor->apellido = "Japellido";

$jor->mostrar();

echo "<br>-------------------------------------------<br>";
class Persona
{
    public string $name;
    public string $lastName;
    public int $age;

    function __construct($first, $last, $age)
    {
        $this->name = $first;
        $this->lastName = $last;
        $this->age = $age;
    }

    function saludar()
    {
        echo "Hola, soy $this->name $this->lastName. Mi edad es $this->age. ";
    }
}
$pepito = new Persona("Jose", "Rivero", 44);
$pepito->saludar();

echo "<br>-------------------------------------------<br>";
class Conexion
{
    public static function conectar()
    {
        $conex = mysqli_connect("localhost", "root", "", "bot");
        echo "Successfully connected";
    }
}
Conexion::conectar();

var_dump($_POST);
if (isset($_POST['boton'])) {

    echo "
    <p id='parrafo'>PARRAFOOOOOOO</p>
    <script>
        setTimeout(()=>document.getElementById('parrafo').innerHTML = '',3000)
    </script>";
}

echo "<br>-------------------------------------------<br>";
 
$productos = array(	
	'Bolígrafo Azul' => array(
		'marca' => "Bic",
		'precio'  => "0.75€",
		'referencia'  => "552BIC12"
	),
	
	'Pegamento' => array(
		'marca' => "Pritt",
		'precio'  => "1.75€",
		'referencia'  => "567PRI13"
	)
);
 
foreach ($productos as $producto=>$detalles){
    echo $producto ."<br>";
    foreach($detalles as $dato=>$valor){
        echo $dato ." - " .$valor ."<br>";
    }
    echo "<br>";
    echo "<hr>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pruebas PHP</title>
</head>

<body>


    <br>
    <br>
    <h2>PROBANDO FORMULARIOS</h2>

    <form action="" method="post">
        <button name="boton">parrafo</button>
    </form>


    <form action="" method="post">
        <h4>seleccione las categorias a imprimir</h4>
        <select name="categorias[]" id="categorias" multiple>
            <option value="">seleccione</option>
            <option value="primera">primera cat</option>
            <option value="segunda">segunda cat</option>
            <option value="tercera">tercera cat</option>
            <option value="cuarta">cuarta cat</option>
        </select>

        <br>

        <h4>seleccione los Hobbies a imprimir</h4>
        <label for="pescar">
            <input type="checkbox" name="hobbies[]" value="pescar" id="pescar">pescar
        </label> <br>
        <label for="nadar">
            <input type="checkbox" name="hobbies[]" value="nadar" id="nadar">nadar
        </label> <br>
        <label for="correr">
            <input type="checkbox" name="hobbies[]" value="correr" id="correr">correr
        </label> <br>
        <label for="cazar">
            <input type="checkbox" name="hobbies[]" value="cazar" id="cazar">cazar
        </label> <br>
        <label for="bicking">
            <input type="checkbox" name="hobbies[]" value="bicking" id="bicking">andar en bici
        </label> <br>

        <br>

        <button>Imprimir Info</button>

    </form>


</body>

</html>