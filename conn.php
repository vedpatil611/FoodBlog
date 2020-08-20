<?php
	$conn = mysqli_connect('localhost', 'root', '', 'foodblog');
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>