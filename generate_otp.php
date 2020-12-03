<?php
 	require "conn.php";
 	require_once 'vendor/autoload.php';
	
	/*
	CREATE EVENT myevent
    ON SCHEDULE EVERY 5 SECOND
    DO
      CALL delete_rows_links();
    */
      
 	function generateOTP($userID) {
 		$otp = rand(1000, 9999);
 		$sql = "INSERT INTO otp(id, OTP) VALUES(".$userID.", ".$otp.")";
 		mysqli_query($conn, $sql);
 		return $otp;
 	}

 	$foodblog_email = "";
 	$foodblog_pass  = "";


 	if(isset($_POST["email"])) {
	 	$email = $_POST["email"];
	 	$username = $_POST["username"];

	 	$id = 0;

	 	$sql = "SELECT id FROM users WHERE username=`".$username."` AND email=`".$email."`";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$id = $row["id"];
				break;
			}
		} else {
			/*
			 *	Username not found or email not found
			 */
		}

		$otp = generateOTP($id);

		$transport = (new Swift_SmtpTransport('smtp.gmail.com', 25))
			->setUsername($foodblog_email)
	  		->setPassword($foodblog_pass);

		$mailer = new Swift_Mailer($transport);

		$message = (new Swift_Message('Password reset'))
			->setFrom([$foodblog_email => 'FoodBlog'])
			->setTo([$email])
			->setBody("Enter otp to reset password: ".$otp);

		$result = $mailer->send($message);
	}
?>
