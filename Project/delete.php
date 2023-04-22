<?php

require('connect.php');

if(isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];

    $stmt = $db->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $count = $stmt->rowCount();

    if($count > 0) {
        echo "Product deleted successfully.";
    } else {
        echo "Product not found.....";
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
    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>
    <form method="post">
        <label for="product_id">Product ID:</label>
        <input type="number" name="product_id" required>
        <br><br>
        <input type="submit" name="delete_product" value="Delete Product">
    </form>
</body>
</html>
