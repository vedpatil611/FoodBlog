<?php 
	require "conn.php"

	$steps = array();
	$images = array();
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include('./partials/header.php');
    session_start();
    if (!isset($_SESSION["user_id"])) {
    	header("Location: login.php");
    }

	$step_count = 1;


    if(isset($_POST['recipe_name'])) {
		$_SESSION['images'] = $images;
		$_SESSION['step_detail'] = $step_detail;
		$_SESSION['step_count'] = 1;

		$_SESSION['recipe_name'] = $_POST['recipe_name'];
		$_SESSION['publisher'] = $_POST['publisher'];
		$_SESSION['description'] = $_POST['description'];
		$_SESSION['recipe_icon'] = $_FILES['photo']['name'];
    } else if(isset($_POST['next'])) {
    	//create next step
    	$_SESSION['step_detail'][$_SESSION['step_count']] = $_POST['step_detail'];
    	$_SESSION['images'][$_SESSION['step_count']] = $_FILES['photo']['name'];
    	$_SESSION['step_count'] = $_SESSION['step_count'] + 1;
    } else {
    	//submit recipe

    	$query = "INSERT INTO recipe(Name, Publisher, Description, Photo) VALUES('".$_SESSION['recipe_name']."', '".$_SESSION['publisher']."', '".$_SESSION['description']."', '".$_SESSION['recipe_icon']."')";

    	mysqli_query($conn, $query);

    	$query = "SELECT id FROM recipe WHERE Name='".$_SESSION['recipe_name']."', Publisher='".$_SESSION['publisher']."', Description='".$_SESSION['description']."'";
    	$result = mysqli_query($conn, $query);

    	$id = 0;

    	if(mysqli_num_rows($result) > 1) {
    		$row = mysqli_fetch_assoc($result);
    		$id = $row['id'];
    	}

    	for ($i=1; $i <= sizeof($_SESSION['step_detail']); $i++) { 
    		$query = "INSERT INTO recipe_detail VALUES(".$id.", ".$i.", '".$_SESSION['step_detail'][$i]."', '".$_SESSION['images'][$i]."')";
    	}
    	
    	header("Location: profile.php");
    }
    
?>

<body>
	<form action="upload_recipe_details.php" method="POST">
		<div class="inputs">
			<label class="custom-file-upload">
				<input type="file" name="photo" multiple="multiple"/>
				Upload Image
            </label>
            <textarea type="text" name="step_detail" placeholder="Step"
            	rows="20" cols="100"></textarea>

			<button type="submit" name="next" value="Upload">NEXT</button>
            <button type="submit" name="submit" value="Upload">SUBMIT</button>
		</div>
	</form>
</body>