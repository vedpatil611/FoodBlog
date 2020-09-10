<?php
  require "conn.php"
?>

<!DOCTYPE html>
<html lang="en">

  <?php
	include('./partials/header.php');
  ?>
  
  <body>
	<div class="grid-container">
		<header class="header">
		  <div class="brand">
			<button onClick="openMenu()">&#9776</button>
			<a href="index.php">The Hungry Chipmunks</a>
		  </div>
		  <div class="header-links">
			<!-- <?php
				session_start();
				if(is_null($_SESSION["user_id"])) {
					echo '<a href="index.php">Home</a>';
					echo '<a href="login.php">Log In</a>';
					echo '<a href="signup.php">Sign Up</a>';
			  	} else {
			  		echo '<a href="index.php">Home</a>';
            		echo '<a href="profile.php">Profile</a>';
            		echo '<a href="#">Logout</a>';
			  	}
			?> -->
			<?php include "./partials/navbar.php" ?>
		  </div>
		</header>
		<aside class="sidebar">
		  <h3>Menu</h3>
		  <button class="sidebar-close-button"  onClick="closeMenu()">
			&#10005
		  </button>
		  <ul>
			<li>
			  <a href="index.php">Recepies</a>
			</li>
			<li>
			  <a href="index.php">Blog</a>
			</li>
		  </ul>
		</aside>
		<main class="main">
		  <div class="search">
			<input  type="text" placeholder="Search">
			<button>&#x2315;</button>
		  </div>

		 
		   
		  <div class="content">

		  <?php
		  
		  $qry = "select * from recipe";
		  if($res=mysqli_query($conn,$qry))
		  {
			if(mysqli_num_rows($res)>0)
			{
	
			  while($row = mysqli_fetch_array($res))
			  {
				echo '<div class="content-item">';
				echo  '<div>'.$row['Name'].'</div>';
				  echo '<div>';
				 echo '<img src="data:image;base64,'.$row['Photo'].'"> ';
				 echo '</div>';
				echo '<div>'.$row['Publisher'].'</div>';
				  echo '<div>';
					echo '<form action="view.php">';
					 echo '<button type="submit">View</button>';
					echo '</form>';
				  echo '</div>';
				echo '</div>';
			  }
			}
		  }
		  
		  ?>

		   
		  </div>
		</main>

		<?php
		  include('./partials/footer.php');
		?>
  


	   
	  </div>
	  <script>
		function openMenu(){
		  document.querySelector(".sidebar").classList.add("open")
		}
  
		function closeMenu(){
		  document.querySelector(".sidebar").classList.remove("open")
		}

		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");

		  if (n > slides.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
			  slides[i].style.display = "none";  
		  }

		  slides[slideIndex-1].style.display = "block";  

		}
	  </script>
  </body>
</html>