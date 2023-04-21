<?php
require("authentication.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

  <body>
    <h4>Login</h4>
            <form method="POST">
                    <label for="username">User ID</label>
                        <input type="text" class="form-control" name="name" id="name">
                    <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                <button type="submit" value="submit" name="login">Login</button>
                <a href="fgt.php" >Reset Password</a>
					<a href="guest.php" >Guest User</a>
                </form>
            </body>