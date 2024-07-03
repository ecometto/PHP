
<?php

class Connect{

    public static function getConnection(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=pruebas_mvc","root","");
            return $conn;
        }
        catch(PDOException $e){
            die("DB Connection error: <br>* " .$e);
        }

    }
}
?>