
<?php 

$param = "";

$uri = explode('/', $_SERVER['REQUEST_URI']);
$controller = $uri[4];
$method = $uri[5];
if(isset($uri[5])){
    $param = $uri[6];
}

require_once 'controllers/controller.php';
$show = new $controller();
$show->$method($param);



?>