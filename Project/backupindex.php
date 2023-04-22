<?php

require('connect.php');

$content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);

$stmt = $db->query("SELECT * FROM products");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
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
                   
                    <li><a href="services.php">Product/Services</a></li>
                 
                </ul>
            </nav>
        </div>
    </main>
    <div id="products" >
    

</div>
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

<?php
require('connect.php');
require('login.php');
$errorFlag = false;

// Check if form was submitted
if(isset($_POST['submit'])) {
    // Get form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
        
        $query = "INSERT INTO users (id, name, email,password) VALUES (:id, :name, :email, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':name', $name);        
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();

        // Redirect to login page
        header('Location: login.php');
        exit;
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up Form</title>
    

</head>
<body>
    <h1>Sign Up Form</h1>
    <form method="post" action="signup.php">
        <label for="id">id:</label>
        <input type="text" name="id" id="id" required>

        <label for="name">name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Sign Up">

    </form>

    <?php if($errorFlag): ?>
        <?= $errorMessage ?>
    <?php endif ?>
</body>
</html>