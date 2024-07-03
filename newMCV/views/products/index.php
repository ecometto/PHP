<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<button><a href="?action=create">NEW</a></button>

    <h3>PRODUCT LIST</h3>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>DESCRIPTION</td>
                <td>PRICE</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $product){ ?>
            <tr>
                <td><?php echo $product['id']?></td>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['description']?></td>
                <td><?php echo $product['price']?></td>
                <td>
                    <a href="?action=details&id=<?php echo $product['id']?>">View</a>
                    <a href="?action=edit&id=<?php echo $product['id']?>">Edit</a>
                    <a href="?action=delete&id=<?php echo $product['id']?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</body>

</html>