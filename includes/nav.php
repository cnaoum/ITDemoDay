<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
<div class="user" id="user">
<?php
    if(isset($_SESSION['userName']) && !strpos($_SERVER['REQUEST_URI'], "logout.php")){
      echo "Welcome ". $_SESSION['userName'];
    }
  ?>
</div>
<header>
    <h1>IT Demo Day!</h1>
</header>
<nav class="top_menu">
    <ul>
      <li>
        <a href="ajaxForm.php">Register</a>
      </li>
      <li>
        <a href="registrations.php">Registrations</a>
      </li>
      <li>
        <a href="login.php">Login</a>
      </li>
      <li>
        <a href="logout.php">Logout</a>
      </li>
    </ul>
  </nav>
