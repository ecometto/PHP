<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>COMPLETE DATOS</h3>
    <form action="controller.php?action=nuevo">
        <input type="email" name="mail" id="mail" placeholder="e-mail">
        <input type="text" name="pass" id="pass" placeholder="password">
        <button name="action" value="guardar">Guardar</button>
    </form>
</body>
</html>