<?php

session_start(); // get access to $_SESSION[]
include('includes/db_connection.php');

if(!isset($_SESSION['userName'])) {
    header('Location:Login.php');
    exit();
}

if ($_SESSION['userType'] != "Admin") {
    session_destroy();
    header('Location:Login.php');
    exit();
}
else {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IT Demo Day</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/custom.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/registrations.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>

<body>
  <header>
   <?php include('includes/nav.php'); ?>
  </header>
  <main>
    <table class="registrationsTable">
      <thead>
        <tr>
          <th>Reg. #</th>
          <th>Team Name</th>
          <th>College Name</th>
          <th>College City</th>
          <th>Student 1</th>
          <th>Student 2</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sqlQuery = "SELECT * FROM `registrations`";
          $sqlResult = $db->query($sqlQuery); // execute the query
          if($sqlResult->num_rows > 0) // if data is returned from DB
          {
            // iterate through the rows
            while($row = $sqlResult->fetch_assoc())
            {
              ?>
              <!-- htmlspecialchars — Convert special characters to HTML entities -->
                <tr>
                  <td><?php echo htmlspecialchars($row['registrationId']); ?></td>
                  <td><?php echo htmlspecialchars($row['teamName']); ?></td>
                  <td><?php echo htmlspecialchars($row['collegeName']); ?></td>
                  <td><?php echo htmlspecialchars($row['collegeCity']); ?></td>
                  <td><?php echo htmlspecialchars($row['student1']); ?></td>
                  <td><?php echo htmlspecialchars($row['student2']); ?></td>
                </tr>
              <?php
            }
          }
        ?>
        
        
      </tbody>
    </table>
  </main>

</body>

</html>
<?php
}