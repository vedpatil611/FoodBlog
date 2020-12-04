<?php
  require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include('./partials/header.php');

    session_start();
    $recipe_id = $_GET['id'];
    $recipe_name = "";
    $recipe_publisher = "";
    $recipe_detail = "";
    $recipe_icon = "";
    $query = "SELECT Name, Publisher, Description, Photo FROM recipe WHERE id=".$recipe_id."";
    $result = mysqli_query($conn, $query);
    // echo mysqli_error($conn);
    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $recipe_name = $row['Name'];
      $recipe_publisher = $row['Publisher'];
      $recipe_detail = $row['Description'];
      $recipe_icon = $row['Photo'];
      // echo $recipe_icon;
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
          <div class="content-view">
            <div class="content-view-item">
            <!-- <img src="res/images/phone-660.jpg"> -->
            <img src="data:image;base64,<?php echo $recipe_icon; ?>" width="200" height="200">
            <div><?php echo $recipe_publisher ?></div> 
            <!-- <div class="social-btn">
              <button>Blog</button>
              <button>Social</button>
              <button>Social</button>
            </div> -->
            </div>
            <div class="content-view-item">
            <h2>Step 1</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis delectus similique porro, eligendi quo accusantium nostrum consequuntur ducimus exercitationem? Impedit fugit, exercitationem enim alias maxime voluptatibus sunt corporis voluptate assumenda?</p>
            <button class="next-btn"><</button>
            <button class="next-btn">></button>
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