<?php
 	require "conn.php"
 	require_once 'vendor/autoload.php';
	
	/*
	CREATE EVENT myevent
    ON SCHEDULE EVERY 5 SECOND
    DO
      CALL delete_rows_links();
    */
      
 	function generateLink() {
 		$otp = rand(1000, 9999);

 	}

 	$foodblog_email = "";
 	$foodblog_pass  = "";


 	if(isset($_POST[""])) {
	 	$email = $_POST["email"];
	 	$username = $_POST["username"];

		$transport = (new Swift_SmtpTransport('smtp.gmail.com', 25))
			->setUsername($foodblog_email)
	  		->setPassword($foodblog_pass);

		$mailer = new Swift_Mailer($transport);

		$message = (new Swift_Message('Forgot password'))
			->setFrom([$foodblog_email => 'FoodBlog'])
			->setTo([$email])
			->setBody('');

		$result = $mailer->send($message);
	}
?>
