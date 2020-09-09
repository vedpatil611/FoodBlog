<?php
  require "conn.php";

  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "SELECT username, password FROM users WHERE username='".$username."', password='".$password."')";
  $result = mysqli_query($conn, $sql);
  
  echo $sql;

  if (mysqli_num_rows($result) == 1) {
    header("Location: profile.php");
  }

    
?>

