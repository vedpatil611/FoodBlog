<?php
  require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include('./partials/header.php');

    session_start();
    $recipe_id = $_GET['id'];
    $step_count = $_GET['step'];
    $max_step = 0;
    $recipe_name = "";
    $recipe_publisher = "";
    $recipe_detail = "";
    $recipe_icon = "";
    $step_detail = "";
    $step_image = "";
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
    $query = "SELECT step_count FROM recipe_details WHERE id=".$recipe_id."";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $max_step = mysqli_num_rows($result);

    $step_count = $step_count % $max_step;
    if($step_count == 0) {
      $step_count = $max_step;
    }
    $query = "SELECT step_detail, image FROM recipe_details WHERE id=".$recipe_id." AND step_count=".$step_count."";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $step_detail = $row['step_detail'];
      $step_image = $row['image'];
    }
    echo $step_image;
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
            <div>
              <?php echo $recipe_name; ?><br>
              <?php echo $recipe_detail; ?><br>
              <?php echo $recipe_publisher; ?><br>
            </div> 
            <!-- <div class="social-btn">
              <button>Blog</button>
              <button>Social</button>
              <button>Social</button>
            </div> -->
            </div>
            <div class="content-view-item">
            <h2>Step <?php echo $step_count; ?></h2>
            <img src="data:image;base64,<?php echo $step_image; ?>" width="200" height="200">
            <p><?php echo $step_detail; ?></p>
            <a href="view.php?id=<?php echo $recipe_id; ?>&step=<?php echo ($step_count + 1); ?>"><button class="next-btn"><</button></a>
            <a href="view.php?id=<?php echo $recipe_id; ?>&step=<?php echo ($step_count - 1); ?>"><button class="next-btn">></button></a>
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