<?php 
  session_start();
  session_destroy(); // deletes the session
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IT Demo Day</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="css/logout.css">
</head>
<header>
     <?php include('includes/nav.php'); ?>
</header>
<body>
 
  <main>
    <div class="formData">
        <?php 
            echo 'Successfully logged out!';
        ?>
    </div>
  </main>
    
</body>
</html>