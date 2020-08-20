<?php
  require "conn.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Hungry Chipmunks</title>
    <link rel="stylesheet" href="public/stylesheets/styles.css?version=53" />
    <link
      href="https://fonts.googleapis.com/css?family=Oxygen:400,300,700"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lora"
      rel="stylesheet"
      type="text/css"
    />
  </head>
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
             <div class="input-log">
                <input  id="username" type="text" placeholder="Enter Email">
            </div> 
            <div class="input-log">
                <input  id="username" type="text" placeholder="Enter Username">
            </div> 
            <div class="input-log">
                <input  id="password" type="password" placeholder="Enter Password">
             </div>
             <div class="submit-log">
                 <button type="submit">Sign Up</button>
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
