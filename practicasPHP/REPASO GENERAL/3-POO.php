<?php

class Persona
{
    public $nombre;
    public $edad;

    public function addData($name, $age)
    {
        $this->nombre = $name;
        $this->edad = $age;
    }

    public function showData()
    {
        echo "The name of the person is: $this->nombre y la edad $this->edad. <br>";
    }
}

$p1 = new Persona();
$p1->addData("Juan", 33);
$p1->nombre = "Otronombre"; //cambiando la propiedad nombre
$p1->showData();

$p2 = new Persona();
$p2->addData("Pedrito", 44);
$p2->edad = 45; //cambiando la propiedad edad
$p2->showData();


class Student extends Persona
{
    public $carrer;

    public function addCarrer($carrer)
    {
        $this->carrer = $carrer;
    }

    public function showStudentData()
    {
        echo "The student $this->nombre tiene $this->edad - Carrer $this->carrer";
    }
}

$s1 = new Student();
$s1->addData("jorgito", 22);
$s1->addCarrer("System");
$s1->showStudentData();

class Car {
    public $id, $brand, $model, $color;

    public function __construct($id, $b,$m, $c){
        $this->brand = $b;
        $this->id = $id;
        $this->model = $m;
        $this->color = $c;
    }

    public function showCarProperties(){
        return "The car  $this->brand-$this->model is color $this->color";
    }

}

// -------------------------------------------------------
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


$carObjects = [];
foreach($data as $cada){
    $n = rand(1,1000);
    $car = "Car".$n;
    $car = new Car($car, $cada['marca'], $cada['modelo'], $cada['color']);
    $carObjects[] = $car;
}

echo "<br><br>";
for ($n=0; $n <= count($carObjects)-1;$n++){
    $txt =  "* " . $carObjects[$n]->id . " / ";
    $txt .= $carObjects[$n]->showCarProperties() ."<br>";
    echo $txt;
   
}



