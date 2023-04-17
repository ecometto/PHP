<?php 
$vehiculo = rand(1,3);
$fecha = date('Y-m-d H:i:s');
$lat = rand(-31300, -31500)/1000;
$lng = rand(-64100, -64300)/1000;


$db = new SQLite3('BASE.sqlite');
$db -> exec("insert into ubicaciones values (null, $vehiculo, '$fecha', '$lat', '$lng')");


echo "<script>
window.location='index.php'
</script>";


?>