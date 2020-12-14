<?php
  require "conn.php"
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include('./partials/header.php');
    session_start();
    
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
            <?php
        
            $user_name = $_GET['id'];
            // echo $user_name;    

            
                $qry = "SELECT username, bio, profile_pic FROM `users` WHERE username='$user_name'";

      
                if($res=mysqli_query($conn,$qry))
                {
                  if(mysqli_num_rows($res)>0)
                  {
          
                    while($row = mysqli_fetch_array($res))
                    {
                        echo '<img src="data:image;base64,'.$row['profile_pic'].'">' ;
                        echo '<div class="profile-user">Username: '.$user_name.'</div>';
                        echo '<div class="profile-user">Bio: '.$row["bio"].'</div>';
                    
                    }
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