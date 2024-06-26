<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h3><a href="views/products/auxcreate.php">NEW PRODUCT</a></h3>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>prod</th>
            <th>price</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($data as $d){ ?>
            <tr>
                <td><?php echo $d['id']?></td>
                <td><?php echo $d['description']?></td>
                <td><?php echo $d['price']?></td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo $d['id'] ?>">edit</a>
                    <a href="index.php?action=delete&id=<?php echo $d['id'] ?>">delete</a>
                </td>
            </tr>

        <?php }?>
    </tbody>
</table>
</body>
</html>