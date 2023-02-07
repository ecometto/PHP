<?php 

function conectar(){
    $con = mysqli_connect('localhost','root','','crud2');
    return $con;
}
