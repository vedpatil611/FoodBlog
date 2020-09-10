<?php
	session_start();
	if(is_null($_SESSION["user_id"])) {
		echo '<a href="index.php">Home</a>';
		echo '<a href="login.php">Log In</a>';
		echo '<a href="signup.php">Sign Up</a>';
	} else {
		echo '<a href="index.php">Home</a>';
        echo '<a href="profile.php">Profile</a>';
		echo '<a href="logout.php">Logout</a>';
	}
?>