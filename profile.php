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
            <a href="index.php">Home</a>
            <a href="login.php">Log In</a>
            <a href="signup.php">Sign Up</a>
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
          <div class="content-profile">

            <div class="content-profile-item">
            <form method="post" enctype="multipart/form-data">
            <br/>
            <div class="inputs">
            <input type="file" name="photo"/>
            <input type="text" name="name" placeholder="Dish"/>
            <input type="text" name="publisher" placeholder="Username"/>
            <input type="text" name="description" placeholder="Description"/>

            <br/><br/>
            <button
             type="submit" name="submit" value="Upload">POST</button>
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
               
              

                $qry="insert into recipe (Name,Publisher,Description,Photo) values ('$name','$publisher','$description','$image')";
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
            <img src="res/images/phone-660.jpg">
            <div class="profile-user">Username</div>
            <div class="profile-user">Bio</div>
            <div class="profile-user">Location</div>
            <div class="profile-user"><a>Website</a></div>
            <div class="profile-btn"><button>&#9974;</button></div>
            </div>
            
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