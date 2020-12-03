<?php
  include 'user_signup.php';
  require "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
  <?php
    include('./partials/header.php');
  ?>
  <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hungry!</title>
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
            <a href="index.php">Hungry!</a>
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
        <?php 
          $emailErr = $_GET["emailErr"];
          $passwordErr = $_GET["passwordErr"];
          $usernameErr = $_GET["usernameErr"];
        ?>
        <main class="main">
          <h1>Sign Up</h1>
          
          
          <!-- User Signup form starting-->
          <!--When user submits this form user_signup.php will be executed that validates the data.-->
          <form name="signup_form" action="user_signup.php" method="post">

            <div class="input-log">
                <input  name="email" type="text" placeholder="Enter Email">
            <span class = "error">* <?php echo $emailErr;?></span>
            </div> 
            <div class="input-log">
                <input  name="username" type="text" placeholder="Enter Username">
            <span class = "error">* <?php echo $usernameErr;?></span>
            </div> 
            <div class="input-log">
                <input  name="password" type="password" placeholder="Enter Password">
            <span class = "error">* <?php echo $passwordErr;?></span>
            </div>
            <div class="submit-log">
                 <button type="submit">Sign Up</button>
             </div>
          </form>
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
