<?php
  require "conn.php";

  $username = strval($_POST['username']);
  $password = $_POST['password'];

	$sql = "SELECT id, username, password FROM `users` WHERE username=?";

  $stmt = mysqli_stmt_init($conn);
  
  if(!mysqli_stmt_prepare($stmt, $sql)) {
  	echo mysqli_stmt_error($stmt);
  }

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
  	$row = mysqli_fetch_assoc($result);
  	if(password_verify($password, $row["password"]) == true) {
  		session_start();
  		$_SESSION["user_id"] = $row["id"];
      $_SESSION["username"] = $row["username"];
    	header("Location: profile.php");
    } else {
			// Print credential errors here
			echo "Wrong password";
		}
  } else {
  	echo "User does not exist";
  }

    
?>

