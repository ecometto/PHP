

<?php 

 $url = "https://jsonplaceholder.org/users";

 $dataJson = file_get_contents($url);

 $arrayPHP = json_decode($dataJson);

foreach($arrayPHP as $cada){
    echo "- $cada->firstname $cada->lastname <br/>";
}



$newJsonData = json_encode($arrayPHP);

echo "<br>";
echo "type: " .gettype($newJsonData) ."<br>";
print_r($newJsonData);

?>