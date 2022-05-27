<?php 

class Persona{
public $nombre = "";
public $edad = 0;
public $sexo = "M";

function __construct($nom,$ed, $se = "M"){
    $this->nombre = $nom;
    $this->edad = $ed;
    $this->sexo = $se;
}

function presentar () {
    echo "La persona <strong>$this->nombre</strong> tiene $this->edad años, y es $this->sexo <br>";
}

function actualizarDatos ($nom,$ed, $se){
    $this->nombre = $nom;
    $this->edad = $ed;
    $this->sexo = $se;
}

}

$persona1 = new Persona("Edgado", 41);
$persona1->presentar();
$persona1->actualizarDatos("Edagrdo D", 42, "M");
$persona1->presentar();

class Ninos{
    
}


?>