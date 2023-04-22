<?php
require("authentication.php");
// Start the session at the beginning of each page
session_start();

// Check if the user has submitted the login form
if (isset($_POST['submit'])) {
    // Get the user's credentials from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate the user against the database
    $sql = "SELECT * FROM `users` WHERE `name`=? AND `password`=? ";
    $query = $db->prepare($sql);
    $query->execute(array($name,$password));
    $row = $query->rowCount();
    $fetch = $query->fetch();
    if ($row > 0) {
        // If the user is authenticated, store their credentials in the session
        $_SESSION['user_id'] = $fetch['id'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        // Redirect the user to the homepage or dashboard
        header('Location: /index.php');
        ob_end_flush();
        exit();
    } else {
        // If the authentication failed, show an error message
        $error = 'Invalid username or password';
    }
}

$searchTerm = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);

if ($searchTerm) {
    $stmt = $db->prepare("SELECT * FROM products WHERE brand LIKE :searchTerm");
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();
} else {
    $stmt = $db->query("SELECT * FROM products");
}
try{
  //sql statement
  $sql="SELECT * FROM products";
  $result=$db->query($sql);
}catch(Exception $e) {
  print "Error: " . $e->getMessage();
  die(); 
}

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
    <a href="kogout.php">Logout</a> 
    <div id="introduction">
        <p>Thank you for visiting our website. Hopefully we can make you happy with our products.</p>
    </div>

    <div id="cover">
        <img src="images/perfumes.jpg" alt="">
        <img src="images/perfumes1.jpg" alt="">
        <img src="images/perfumes2.jpg" alt="">
        <img src="images/perfumes3.jpg" alt="">
        <img src="images/perfumes4.jpg" alt="">
        <img src="images/perfumes5.jpg" alt="">
        <img src="images/perfumes6.jpg" alt="">
        <img src="images/perfumes7.jpg" alt="">
    </div>

    <h1>All of our currently available products </h1>

    <div id="search">
        <form method="get">
            <label for="search">Search:</label>
            <input type="text" name="search" id="search" value="<?php echo $searchTerm ?>">
            <button type="submit">Submit</button>
        </form>
    </div>

    <div id="products">
        <?php
        echo '<table>';
        echo '<tr><th>ID</th><th>Brand</th><th>Price</th><th>Stock</th><th>Image</th></tr>';
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
          echo '<td><a href="perfumes.php?id=' . $row['id'] . '">' . $row['brand'] . '</a></td>';

            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['stock'] . '</td>';
            echo '<td>' . $row['image'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>

    <main>
        <div id="navBody">
            <nav>
                <ul>
                  <li><a href="services.php">Product/Services</a>
                </ul>
            </nav>
        </div>
    </main>

    <div id="description">
        <p>We have all the perfume collections from old to the most recent ones.
        We</p>
        <p>Our products are 100% genuine and have been sourced directly from the manufacturers or authorized distributors.</p>
        <p>We offer a variety of payment options and fast shipping to ensure that you receive your order as quickly as possible.</p>
        <p>If you have any questions or concerns, please don't hesitate to contact us.</p>
        <p class="text-center margin-top-20">Don't have an account? <a href="signup.php">Sign up</a> here!</p>
    </div><footer>
    <p>Perfume StockX &copy; 2023</p>
</footer>
</body>
</html>
