<?php

class Persona
{
    public $nombre = "";
    public $edad = 0;
    public $sexo = "M";

    function __construct($nom, $ed, $se = "M")
    {
        $this->nombre = $nom;
        $this->edad = $ed;
        $this->sexo = $se;
    }

    function presentar()
    {
        echo "La persona <strong>$this->nombre</strong> tiene $this->edad años, y es $this->sexo <br>";
    }

    function actualizarDatos($nom, $ed, $se)
    {
        $this->nombre = $nom;
        $this->edad = $ed;
        $this->sexo = $se;
    }
}


class Nino extends Persona
{
    public function presentar_nino(){
            echo "hola soy un niño. Mi nombre es $this->nombre, tengo $this->edad y soy de sexo $this->sexo";
    }
}

$juancito = new Nino('Juan','13','M');

$juancito->presentar_nino();
