<?php 

class Conexion extends SQLite3 {
    function __construct(){
        $this->open("DDBB.sqlite");
    }
}

$db = new Conexion();


if ($db){
    echo "si.. conecta..";
}else{
    echo "no, no conecta ni bosta";
}

?>