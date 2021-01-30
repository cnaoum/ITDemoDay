<?php
//start session
session_start(); // get access to $_SESSION[]
include('includes/db_connection.php');

$errors = '';
if(!empty($_POST)){ // check if the form was submitted
  $userName = $db->real_escape_string($_POST['userName']);
  $userPassword = $db->real_escape_string($_POST['userPassword']);

  $sqlQuery = "SELECT * FROM `users` WHERE `userName` = '$userName' AND `userPassword` = '$userPassword'";

  $sqlResult = $db->query($sqlQuery); // execute the query
  

  if($sqlResult->num_rows > 0) // if data is returned from DB
  {
    // iterate through the rows
    while($row = $sqlResult->fetch_assoc())
    {
      $_SESSION['userName'] = $row['userName'];
      $_SESSION['userType'] = $row['userType']; 
      break;
    }
    header('Location:registrations.php');
  }
  else {
      $errors = 'Invalid user name or password!';
  }


}



?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IT Demo Day</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
 
<body>
  <header>
  <?php include('includes/nav.php'); ?>
  </header>

  <main>
    <form name="loginForm" method="Post" action="">
      <label>Username</label>
      <input id="userName" type="text" class="textInput" name="userName"><br />

      <label>Password</label>
      <input id="userPassword" type="password" class="textInput" name="userPassword"><br />


      <br /><br />

      <input class="btn" type="submit" value="Login">
      <p id="errors"><?php echo $errors;?></p>
    </form>
  </main>
  
  <div class="clear"></div>
</body>

</html>