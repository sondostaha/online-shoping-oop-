<?php
session_start(); 
 //require_once('../handlers/handelLogin.php');
?>
<html>
    <head lang="en">
<title>Online Shop</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Online Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="index.php">All product</a>

      <?php  if(isset($_SESSION['id'])) {?>
      <a class="nav-item nav-link" href="add.php">Add New</a>
      <?php } ?>
    </div>
      <div class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['id'])) {?>
        
        <a class="nav-item nav-link" href="#"><?php echo $_SESSION['username'] ; ?> </a>

        <a class="nav-item nav-link disable" href="handlers/handelLogout.php">Log Out</a>
      </div>
      <?php } ?>
    </div>
  </div>
</nav>