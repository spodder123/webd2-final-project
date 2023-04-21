<?php
	
	
	require_once 'connect.php';
	
	if(ISSET($_POST['login'])){
		if($_POST['name'] != "" || $_POST['password'] != ""){
			$name = $_POST['name'];
			// md5 encrypted
			// $password = md5($_POST['password']);
			$password = $_POST['password'];
			$sql = "SELECT * FROM `users` WHERE `name`=? AND `password`=? ";
			$query = $db->prepare($sql);
			$query->execute(array($name,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['users'] = $fetch['id'];
				header("location:index.php");
			} else{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'index.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'index.php'</script>
			";
		}
	}
?>