

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA</title>
</head>
<body>

<h1>views from views/index</h1>
<table>
    <thead>
        <tr>
        <th>id</th>
        <th>description</th>
        <th>price</th>
    </tr>
    </thead>
    <tbody>
        <?php 
            foreach($data as $dato){ ?>
                
                <tr>
                    <td><?php echo $dato['id'] ?></td>
                    <td><?php echo $dato['description'] ?></td>
                    <td><?php echo $dato['price'] ?></td>
                </tr>
            
                <?php  } ?>
        
    </tbody>
</table>