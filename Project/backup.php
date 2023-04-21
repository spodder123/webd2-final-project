<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Document</title>
</head>
<body>
<header>
        <h1>Perfume StockX</h1>
        <h3>Your favourite perfumes in the cheapest possible price you can ever get.</h3>
    </header>
  <p>the details about the perfume brand will be shown here</p>
<footer>
        <div id="conclusion">
            <p>
                 Red River College||Shudipto Podder
            </p>
            <a href="index.php">Back to Home</a>
        </div>
    </footer>
</body>
</html> -->
<?php
// Get the perfume ID from the query parameter
if (!isset($_GET['id'])) {
    // Redirect to an error page if ID is not provided
    header('Location: error.php');
    exit;
}
$id = $_GET['id'];

// Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=test", "username", "password");

// Prepare a SQL statement to fetch perfume information based on ID
$stmt = $conn->prepare("SELECT * FROM perfumes WHERE id = :id");
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

// Update perfume information in the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];

    // Prepare a SQL statement to update perfume information
    $stmt = $conn->prepare("UPDATE perfumes SET brand = :brand, price = :price, stock = :stock, image = :image WHERE id = :id");
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirect to the updated perfume page
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
    <form method="post" action="">
        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
        <p><strong>Brand:</strong> <input type="text" name="brand" value="<?php echo $row['brand']; ?>"></p>
        <p><strong>Price:</strong> <input type="text" name="price" value="<?php echo $row['price']; ?>"></p>
        <p><strong>Stock:</strong> <input type="text" name="stock" value="<?php echo $row['stock']; ?>"></p>
        <p><strong>Image:</strong> <input type="text" name="image" value="<?php echo $row['image']; ?>"></p>
        <!-- You can display other perfume information here -->
        <input type="submit" value="Save">
    </form>
</body>
</html>
