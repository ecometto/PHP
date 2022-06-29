<?php

class Mesa
{
    public $material, $color;

    public function __construct($material = "madera", $color = "marron")
    {
        $this->material = $material;
        $this->color = $color;
    }

    function presentar()
    {
        echo "esta mesa es de $this->material y su color es $this->color <br>";
    }

    function set_Attr($mat, $col)
    {
        $this->material = $mat;
        $this->color = $col;
    }
}


$mesa1 = new Mesa();

$mesa1->presentar();
$mesa1->set_Attr("hierro", "negro");
$mesa1->presentar();