<?php
  require "conn.php"
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include('./partials/header.php');
    session_start();
    if (!isset($_SESSION["user_id"])) {
    	header("Location: login.php");
    }
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
            <a href="index.php">Blog</a>
          </li>
        </ul>
      </aside>
      <main class="main">
        <div class="search">
            <!-- <input  type="text" placeholder="Search">
            <button>&#x2315;</button> -->
        </div>
        <div class="content-profile">

        <div class="content-profile-item">
          <h1>Post a Recipe</h1>
          <form method="post" name="new_recipe" action="upload_recipe_details.php" enctype="multipart/form-data">
            <br/>
            <div class="inputs">
            <!-- <input  type="file" name="photo"/> -->
            <label class="custom-file-upload">
              <input type="file" name="photo" multiple="multiple"/>
                   Upload Image
            </label>
            <input type="text" name="recipe_name" placeholder="Dish"/>
            <input type="text" name="description" placeholder="Description"/>

            <br/><br/>
            <button
             type="submit" name="submit" value="Upload">NEXT</button>
            </div>
          </form>
          <?php
            
            if(isset($_POST['submit']) && isset($_FILES['photo']))
            {
                if(getimagesize($_FILES['photo']['tmp_name'])==FALSE)
                {
                    echo "Please select an image";
                }
                else
                {
                    $image= addslashes($_FILES['photo']['tmp_name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    $name=$_POST['name'];
                    $publisher=$_POST['publisher'];
                    $description=$_POST['description'];
                    saveimage($name,$image,$publisher,$description,$conn);
                
                }
            }
           

            function saveimage($name,$image,$publisher,$description,$con)
            {
               
              

                $qry="insert into recipe (Name,Publisher,Description,Photo,like,dislike) values ('$name','$publisher','$description','$image',0,0)";
                $result=mysqli_query($con, $qry);
                if($result)
                {
                    echo "<br/> Uploaded";
                }
                else
                {
                    echo "<br/> Not Uploaded";
                }
            }

           
        ?>
            
            </div>
            <div class="content-profile-item">
            <?php

            	$user_id = $_SESSION["user_id"];
            	$sql = "SELECT username, bio, profile_pic FROM `users` WHERE id=?";

 	 			$stmt = mysqli_stmt_init($conn);
  
  				if(!mysqli_stmt_prepare($stmt, $sql)) {
  					echo mysqli_stmt_error($stmt);
 				}

				mysqli_stmt_bind_param($stmt, "i", $user_id);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$row = mysqli_fetch_assoc($result);

           	 	echo '<img src="data:image;base64,'.$row['profile_pic'].'">' ;
            	echo '<div class="profile-user">Username: '.$row["username"].'</div>';
            	echo '<div class="profile-user">Bio: '.$row["bio"].'</div>';
              echo '<div class="profile-btn"><a href="editProfile.php"><button>Edit</button></a></div>';
              echo '<div class="profile-btn"><a href="post_blog.php"><button>Blog</button></a></div>';

  
            ?>
            
          </div>
        </main>




        <footer class="footer">&copy;ChipmunksCo</footer>
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
<?php
echo $_SESSION[id];
?>