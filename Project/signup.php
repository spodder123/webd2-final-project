<?php
require('connect.php');
require('login.php');
$errorFlag = false;

// Check if form was submitted
if(isset($_POST['submit'])) {
    // Get form data

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        $errorFlag = true;
        $errorMessage = "Passwords do not match. Please try again.";
    } else {
        $query = "INSERT INTO users (name, email,password) VALUES ( :name, :email, :password)";
        $statement = $db->prepare($query);
    
        $statement->bindValue(':name', $name);        
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();

        // Redirect to login page
        header('Location: login.php');
        exit;
    }
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
        

        <label for="name">name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <input type="submit" name="submit" value="Sign Up">

    </form>

    <?php if($errorFlag): ?>
        <?= $errorMessage ?>
    <?php endif ?>
</body>
</html>

