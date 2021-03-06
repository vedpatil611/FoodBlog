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
            <a href="blog.php">Blog</a>
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
              <h1>Post a Blog</h1>
            <form method="post" enctype="multipart/form-data">
            <br/>
            <div class="inputs">
   
            <input type="text" name="title" placeholder="Title"/>
            <input type="text" name="author" placeholder="Author"/>
            <textarea class="pb-desc" rows="15" cols="50"  name="description" placeholder="Description"></textarea>

            <br/><br/>
            <button
             type="submit" name="submit" value="Upload">POST</button>
            </div>
          </form>

          <?php
            
            if(isset($_POST['submit']))
            {
                    $title=$_POST['title'];
                    $author=$_POST['author'];
                    $description=$_POST['description'];
                    runquery($title,$author,nl2br($description),$conn);
            }
           

            function runquery($title,$author,$description,$conn)
            {
               
              

                $qry="insert into blog (title,author,description) values ('$title','$author','$description')";
                $result=mysqli_query($conn, $qry);
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