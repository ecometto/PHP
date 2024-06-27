<?php 

function Connect(){
    try{
        $conn = new PDO("mysql:host=127.0.0.1;dbname=pruebas","root","");
        return $conn;
    }
    catch(PDOException $e){
        Die ("Error Connection: <br>- " .$e);
    }
}



?>