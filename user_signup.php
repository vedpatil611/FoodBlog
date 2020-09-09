<?php
  require "conn.php";

  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO users(username, email, password) VALUES('".$username."', '".$email."', '".$password."')";
  
  if(mysqli_query($conn, $sql)) {
    header("Location: login.php");
  } 
?>

