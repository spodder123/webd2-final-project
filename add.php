<?php
require('connect.php');

if(isset($_POST['submit'])){
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];
    $description=$_POST['Description'];

    $stmt = $db->prepare("INSERT INTO products (brand, price, stock, image,Description) VALUES (:brand, :price, :stock, :image,:description)");
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':description', $description);

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
        <label for="image">Description:</label>
        <input type="text" name="Description" required><br><br>
        <input type="submit" name="submit" value="Add Product">
        <a href="index.php">Back to Home</a>
    </form>
</div>
</body>
</html>
