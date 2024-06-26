<?php

function connect () {
    try{
        $conn = new PDO("mysql:host=localhost;dbname=pruebas_mvc","root","");
        echo "connected";
        return $conn;
    }
    catch(PDOException $e){
        die("Connexion Error: $e");
    }
}


?>