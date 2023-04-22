<?php
require('connect.php');
if(isset($_POST['submit'])){
    $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_NUMBER_INT);
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_URL);

    $stmt = $db->prepare("INSERT INTO products (brand, price, stock, image) VALUES (:brand, :price, :stock, :image)");
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':image', $image);
    $stmt->execute();

    echo "Product added successfully";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Add Product</title>
</head>
<body>
    <div id="add">
    <h1>Add Product</h1>
    <form method="POST" action="">
        <label for="brand">Brand:</label>
        <input type="text" name="brand" required><br><br>
        <label for="price">Price:</label>
        <input type="text" name="price" required><br><br>
        <label for="stock">Stock:</label>
        <input type="text" name="stock" required><br><br>
        <label for="image">Image:</label>
        <input type="text" name="image" required><br><br>
        <input type="submit" name="submit" value="Add Product">
    </form>
</div>
</body>
</html>
