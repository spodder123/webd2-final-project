<?php

require('connect.php');

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];

    $stmt = $db->prepare("UPDATE products SET brand=:brand, price=:price, stock=:stock, image=:image WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':image', $image);

    if($stmt->execute()) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Edit Product</title>
</head>
<body>
    <header>
        <h1>Edit Product</h1>
    </header>

    <form method="POST">
        <label for="id">Product ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" placeholder="enter only numbers" required><br><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" placeholder="enter only numbers"  required><br><br>

        <label for="image">Image:</label>
        <input type="text" id="image" name="image" required><br><br>

        <input type="submit" name="submit" value="Update Product">
    </form>

    <a href="index.php">Back to Home</a>

    <footer>
        <div id="conclusion">
            <p>
                Red River College||Shudipto Podder
            </p>
        </div>
    </footer>
</body>
</html>
