

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h3>Editing product: <b><?php echo $data[0]['name']?></b></h3>

<form action="" method="POST">
    <input type="hiden" name="id" value="<?php echo $data[0]['id']?>"> <br>
    <input type="text" name="name" value="<?php echo $data[0]['name']?>"> <br>
    <input type="text" name="description" value="<?php echo $data[0]['description']?>"> <br>
    <input type="number" name="price" value="<?php echo $data[0]['price']?>"> <br>
    <button type="submit" name="update">Update</button>
</form>
</body>
</html>