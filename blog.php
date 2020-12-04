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
			<a href="index.php">Hungry!</a>
		  </div>
		  <div class="header-links">
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
            <a href="blog.php">Blog</a>
			</li>
		  </ul>
		</aside>
		<main class="main">
		  <div class="search">
			<!-- <input  type="text" placeholder="Search">
			<button>&#x2315;</button> -->
		  </div>

		 
		   
		  <div class="blog-content">

		  <?php
		  
		  $qry = "select * from blog";
		  if($res=mysqli_query($conn,$qry))
		  {
			if(mysqli_num_rows($res)>0)
			{
	
			  while($row = mysqli_fetch_array($res))
			  {
				

				echo '<div class="blog-item">
				<h2 class="blog-item-title">'.$row['title'].'</h2>
				<div class="blog-item-author">'.$row['author'].'</div>
				<div class="blog-item-desc">'.$row['description'].'</div>
			  </div>';
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

	

		
	  </script>
  </body>
</html>