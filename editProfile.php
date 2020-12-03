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
              <h1>Edit Profile</h1>
            <form method="post" enctype="multipart/form-data">
            <br/>
            <div class="inputs">
            <label class="custom-file-upload">
              <input type="file" name="profile"/>
                   Upload Image
            </label>
            <!-- <input type="file" name="profile"/> -->
            <input type="text" name="bio" placeholder="Bio"/>


            <br/><br/>
            <button
             type="submit" name="submit" value="Upload">Update</button>
            </div>
          </form>
          <?php
            
            if(isset($_POST['submit']) && isset($_FILES['profile']))
            {
                if(getimagesize($_FILES['profile']['tmp_name'])==FALSE)
                {
                    echo "Please select an image";
                }
                else
                {
                    $profileimg= addslashes($_FILES['profile']['tmp_name']);
                    $profileimg= file_get_contents($profileimg);
                    $profileimg= base64_encode($profileimg);
                    $bio=$_POST['bio'];
                    saveprofiledetails($profileimg,$bio,$conn);
                
                }
            }
           

            function saveprofiledetails($profileimg,$bio,$con)
            {
               
              
                $user_id = $_SESSION["user_id"];
                
                $qry="update users set profile_pic='$profileimg', bio='$bio' where id=$user_id";
            

                $result=mysqli_query($con, $qry);
                if($result)
                {
                    echo "<br/> Edited Profile";
                }
                else
                {
                    echo "<br/> Not Edited";
                }
            }

           
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