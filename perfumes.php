<?php
require("connect.php");
include 'comments.php';
// Get the perfume ID from the query parameter
if (!isset($_GET['id'])) {
    // Redirect to an error page if ID is not provided
    header('Location: error.php');
    exit;
}
$id = $_GET['id'];

// Connect to the database
$conn = new PDO('mysql:host=localhost;dbname=serverside;charset=utf8', 'serveruser', 'gorgonzola7!'); // Replace with your actual database credentials

// Prepare a SQL statement to fetch perfume information based on ID
$stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

// Fetch perfume information from the database
$row = $stmt->fetch();

// Check if perfume exists
if (!$row) {
    // Redirect to an error page if perfume not found
    header('Location: error.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];
    $description= $_POST['Description'];

    $stmt = $conn->prepare("UPDATE products SET brand = :brand, price = :price, stock = :stock, image = :image, Description = :Description WHERE id = :id");
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':Description', $description);

    $stmt->execute();
    
    // Properly enclose the hyperlink code in a PHP echo statement
    echo '<a href="comments.php">Click here to view comments</a>';

    header("Location: perfume.php?id=$id");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfume Details</title>
</head>
<body>
     <h1>Perfume Details</h1>
    <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
    <p><strong>Brand:</strong> <?php echo $row['brand']; ?></p>
    <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
    <p><strong>Stock:</strong> <?php echo $row['stock']; ?></p>
    <p><strong>Image:</strong> <?php echo $row['image']; ?></p>
    <p><strong>Description:</strong> <?php echo $row['Description']; ?></p>
    <a href="index.php">Back to Home</a>
</body>
</html>
