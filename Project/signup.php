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
