<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Product List</h1>
    <a href="/php/basicMVC/?action=create">Add New Product</a>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo htmlspecialchars($product['name']); ?> 
                <a href="/php/basicMVC/?action=show&id=<?php echo $product['id']; ?>">View</a>
                <a href="/php/basicMVC/?action=edit&id=<?php echo $product['id']; ?>">Edit</a>
                <a href="/php/basicMVC/?action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
