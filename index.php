<?php
  require "conn.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Hungry Chipmunks</title>
    <link rel="stylesheet" href="public/stylesheets/styles.css" />
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
            <a href="index.html">The Hungry Chipmunks</a>
          </div>
          <div class="header-links">
            <a href="index.html">Home</a>
            <a href="index.html">Log In</a>
            <a href="index.html">Sign In</a>
          </div>
        </header>
        <aside class="sidebar">
          <h3>Menu</h3>
          <button class="sidebar-close-button"  onClick="closeMenu()">
            &#10005
          </button>
          <ul>
            <li>
              <a href="index.html">Recepies</a>
            </li>
            <li>
              <a href="index.html">Blog</a>
            </li>
          </ul>
        </aside>
        <main class="main">
          <div class="search">
            <input  type="text" placeholder="Search">
            <button>&#x2315;</button>
          </div>
          <div class="content">
            <div class="content-item">
              Dummy Text
            </div>
            <div class="content-item">
              Dummy Text
            </div>
            <div class="content-item">
              Dummy Text
            </div>
            <div class="content-item">
              Dummy Text
            </div>
            <div class="content-item">
              Dummy Text
            </div>
            <div class="content-item">
              Dummy Text
            </div>
            <div class="content-item">
              Dummy Text
            </div>
            <div class="content-item">
              Dummy Text
            </div>
          </div>
        </main>


        <div id="main-content" class="container"></div>


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
