<?php 
$con = mysqli_connect('localhost','root','','prueba');

// ENVIANDO LISTA COMPLETA PARA LA PAGINA DE INICIO
if(isset($_GET['action']) && $_GET['action']=="load" ){

    $where = "where 1 = 1";
    $SelectAll = "select * from prueba $where";
    $ejecutar = mysqli_query($con, $SelectAll);
    $data = mysqli_fetch_all($ejecutar, MYSQLI_BOTH);
    
    echo json_encode($data);
    mysqli_close($con);
}



// ENVIANDO DATO DE UN SOLO USUARIO
if(isset($_GET['action']) && $_GET['action']=="getUser" ){
    $id = $_GET['id'];
    $SelectUser = "select * from prueba where id = $id";
    $ejecutar = mysqli_query($con, $SelectUser);
    $data = mysqli_fetch_array($ejecutar);
    
    echo json_encode($data);
    mysqli_close($con);
}



// INSERTANDO REGSITRO NUEVO USUARIO
if(isset($_POST['action']) && $_POST['action'] == "insertNewUser"){
    $user = $_POST['user'];
    $mail = $_POST['mail'];
    $query = "insert into prueba (usuario, mail) values('$user', '$mail')";
    $ejecutar = mysqli_query($con, $query);
    
    echo $ejecutar;
}


// ELIMINANDO REGISTRO 
if(isset($_POST['action']) and $_POST['action']  == "delete"){
    $item = $_POST['item'];
    $query = "delete from prueba where id = $item";
    $ejecutar = mysqli_query($con, $query);

    echo $ejecutar;
}




?>