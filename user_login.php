<?php
  require "conn.php";

  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "SELECT username, password FROM users WHERE username='".$username."', password='".$password."')";
  $result = mysqli_query($conn, $sql);
  
  if(mysqli_query($conn, $sql)) {
  	header("Location: login.php");
  } 
?>

