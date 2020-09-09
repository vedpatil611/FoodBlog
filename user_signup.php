<?php
  require "conn.php";
  
/*Defining Storage variables*/

  $email = $username = $password = "";
  $emailErr = $usernameErr = $passwordErr = "";

/*Verifying if the request is a POST or GET*/

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

/*---------------------------Name Field Validation-----------------------------*/
    //Check if empty field
    if (empty($_POST["name"])) {
      $usernameErr = "Name is required";}
    //Check if only alphabets and numbers present in username
    elseif (!preg_match ("/^[a-zA-Z0-9]*$/", validate_sql_injection($_POST["username"]))) {
       $usernameErr = "Only Numbers and Alphabets allowed for User Name!!";   }
    //Finally store the validated username
    else {
     $username = validate_sql_injection($_POST["username"]);
    }

    
/*---------------------------Email Field Validation-----------------------------*/
    //Check if empty field
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";}
    //Check if the email is of a .com domain format
    elseif (!preg_match ("/^[a-zA-Z0-9]*[@][a-zA-Z]*.com$/", validate_sql_injection($_POST["email"]))) {
       $emailErr = "Not a valid email format";   }
    //Finally store validated email
    else {
     $email = validate_sql_injection($_POST["email"]);
    }

    
/*---------------------------Password Field Validation-----------------------------*/
    //Check if empty field
    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    }
    //Check if atleast one capital letter present
    elseif (!preg_match ("/[A-Z]+/", validate_sql_injection($_POST["password"]))) {
       $passwordErr = "Requires atleast 1 capital letter!";   
    }
    //Check if atleast one digit present
    elseif (!preg_match ("/[0-9]+/", validate_sql_injection($_POST["password"]))) {
       $passwordErr = "Requires atleast 1 number!";   }
    //Check if Special chars present
    elseif (!preg_match ("/[@.#%^]+/", validate_sql_injection($_POST["password"]))) {
       $passwordErr = "Requires atleast 1 Special character @.#%^";    
    }else {
     $password = password_hash(validate_sql_injection($_POST["password"]), PASSWORD_DEFAULT);
    }
}

  $sql = "INSERT INTO users(username, email, password) VALUES('".$username."', '".$email."', '".$password."')";
  
//function to avert simple sql injection
  function validate_sql_injection($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

  if(mysqli_query($conn, $sql)) {
    header("Location: login.php");
  } 
 
?>

