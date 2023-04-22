<?php

// Database connection
$host = "localhost";
$user = "serveruser";
$password = "gorgonzola7!";
$database = "serverside";
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$product_id = $_GET['id'];
// Insert comme
if (isset($_POST['submit_comment'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";
    mysqli_query($conn, $sql);
}

// Edit comment
if (isset($_POST['edit_comment'])) {
    $id = $_POST['id'];
    $comment = $_POST['comment'];
    $sql = "UPDATE comments SET comment='$comment', updated_at=CURRENT_TIMESTAMP WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Delete comment
if (isset($_POST['delete_comment'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM comments WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Fetch comments
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

// Display comments
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='comment'>";
        echo "<p>" . $row['comment'] . "</p>";
        echo "<p>Posted by " . $row['name'] . " on " . $row['creation_time'] . "</p>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'/>";
        echo "<textarea name='comment'>" . $row['comment'] . "</textarea>";
        echo "<button type='submit' name='edit_comment'>Edit</button>";
        echo "<button type='submit' name='delete_comment'>Delete</button>";
        echo "</form>";
        echo "</div>";
    }
}

mysqli_close($conn);

?>

<!-- HTML form for submitting new comments -->
<form method="post" action="">
    <input type="text" name="name" placeholder="Name" required/>
    <input type="email" name="email" placeholder="Email" required/>
    <textarea name="comment" placeholder="Comment" required></textarea>
    <button type="submit" name="submit_comment">Post Comment</button>
</form>
