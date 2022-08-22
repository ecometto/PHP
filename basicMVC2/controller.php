<?php


$action = $_GET['action'];
$URL = 'view_' .$action .'.php';

echo $action .'<br>';



if ($action === 'index') {
    include_once 'model.php';

    $art = new articulos;
    $datos = $art->get_products();  

    include_once 'view.php';

} elseif($action === 'guardar') {
    include_once 'model.php';

    $mail =  $_GET['mail'];
    $pass =  $_GET['pass'];

    $art = new articulos;
    $result = $art->insert_products($mail, $pass);  
    if($result){

        $datos = $art->get_products();
        
    header("Location: index.php?action=index");
    echo "<script>alert('registro ingresado corectamente'</script>";

    };


};


