<?php
	require "conn.php";
	
/*Defining Storage variables*/

	$email = $username = $password = "";
	$emailErr = $usernameErr = $passwordErr = "";
/*Verifying if the request is a POST or GET*/

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

/*---------------------------Name Field Validation-----------------------------*/
		//Check if empty field
		if (empty($_POST["username"])) {
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

		

		if($usernameErr=="" && $emailErr=="") {

			
				$sql = "SELECT username from `users` where username=?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)) {
  					echo mysqli_stmt_error($stmt);
  				}
  				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if(mysqli_num_rows($result) > 0) {
					$usernameErr = "Username is already taken";
				}
			
	
			
				$sql = "SELECT email from `users` where email=?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)) {
  					echo mysqli_stmt_error($stmt);
  				}
  				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if(mysqli_num_rows($result) > 0) {
					$emailErr = "Email id is already in use";
				}
			

			if($usernameErr=="" && $emailErr=="" && $passwordErr=="") {
				$v_key = md5(time().$username);

				$sql = "INSERT INTO users(username, email, password, vCode) VALUES(?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
  
	  			if(!mysqli_stmt_prepare($stmt, $sql)) {
  					echo mysqli_stmt_error($stmt);
  				}

				mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $v_key);
				if(mysqli_stmt_execute($stmt)) {

					$email_to = $email;
					$email_subject = "Email Verification";
					$email_message = "<a href='http://localhost/FoodBlog/verify.php?v_key=$v_key'>Verify Email</a>";
					$header  = "From: hungry.foodblog@gmail.com \r\n";
					$header .= "MIME-Version: 1.0 \r\n";
					$header .= "Content-type:text/html;charset=UTF-8 \r\n";

					mail($email_to, $email_subject, $email_message, $header);

					header("Location: login.php");
				}
			} else {
				header("Location: signup.php?".$emailErr."&usernameErr=".$usernameErr."&passwordErr=".$passwordErr);
			}
		} else {
			header("Location: signup.php?".$emailErr."&usernameErr=".$usernameErr."&passwordErr=".$passwordErr);
		}
		// if(mysqli_query($conn, $sql)) {
		// 	header("Location: login.php");
		// }
}

	
//function to avert simple sql injection
	function validate_sql_injection($data) {
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
				 }

 
?>

