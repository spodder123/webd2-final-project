<?php

require('connect.php');

$stmt = $db->query("SELECT * FROM products");

?>

<!DOCTYPE html>
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
    
    <a href="login.php">Login</a> 

    <div id="introduction">
    <p>Thank you for visiting our website.Hopefully we can make you happy with our products.</p>
    </div>
    <div id="cover">
<img src="images/perfumes.jpg" alt="" >
<img src="images/perfumes1.jpg" alt="" >
<img src="images/perfumes2.jpg" alt="" >
<img src="images/perfumes3.jpg" alt="" >
<img src="images/perfumes4.jpg" alt="" >
<img src="images/perfumes5.jpg" alt="" >
<img src="images/perfumes6.jpg" alt="">
<img src="images/perfumes7.jpg" alt="">
</div>
<h1>All of our currently available products </h1>
    
<div id="products">
    
<?php
echo '<table>';
echo '<tr><th>ID</th><th>Brand</th><th>Price</th><th>Stock</th><th>Image</th></tr>';
while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['brand'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '<td>' . $row['stock'] . '</td>';
    echo '<td>' . $row['image'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
</div>


</div>
    <main>
        <div id="navBody">
            <nav>
                <ul>
                   
                    <li><a href="add.php">Add Product</a></li>
                    <li><a href="edit.php">Edit Product</a></li>
                    <li><a href="delete.php">Delete  Product</a></li>
                 
                </ul>
            </nav>
        </div>
    </main>
    <div id="description">
        <p>We have all the perfume collections from old to the most recent ones.
        We sell them at the cheapest price possible and we guarantee your money bag if you don't like the product after purchasing.
        Moreover, we give around 15days in-return warranty</p>
        </div>
    <footer>
        <div id="conclusion">
            <p>
                 Red River College||Shudipto Podder
            </p>
        </div>
    </footer>
</body>
</html>