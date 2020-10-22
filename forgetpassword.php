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
          <h1>Forget Password</h1>
          <form name="login_form" action="" method="post">
             <div class="input-log">
                <input  name="username" type="text" placeholder="Enter Username">
            </div> 
            <div class="input-log">
                <input  name="email" type="password" placeholder="Enter Email">
             </div>
             <div class="submit-log">
                 <button><a href="otp.php">Send Mail</a></button>
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
