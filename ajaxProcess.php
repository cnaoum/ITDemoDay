<?php


    include('includes/db_connection.php');

    $teamName = $db->real_escape_string(strtoupper($_POST['teamName']));
    $collegeName = $db->real_escape_string(strtoupper($_POST['collegeName']));
    $collegeAddress = $db->real_escape_string(strtoupper($_POST['collegeAddress']));
    $collegeCity = $db->real_escape_string(strtoupper($_POST['collegeCity']));
    $province = $_POST['province'];
    $student1Name = $db->real_escape_string($_POST['student1Name']);
    $student1Email = $db->real_escape_string($_POST['student1Email']);
    $student2Name = $db->real_escape_string($_POST['student2Name']);
    $student2Email = $db->real_escape_string($_POST['student2Email']);

    $emailPattern = "/^[^\_\.][\w]*@[\w]+\.[\w]+$/";

    $errors = "";
    if($teamName == '') //if  team name was not set by user
    { 
        $errors = 1; //set errors flag to 1
        echo 'Please enter a Team name <br>';
    }
    if($collegeName == '') //if  college name was not set by user
    { 
        $errors = 1; //set errors flag to 1
        echo 'Please enter the College name <br>';
    }
    if($collegeAddress == '')
    {
        $errors = 1;
        echo 'Please enter a street name <br>';
    }
    if($collegeCity == '')
    {
        $errors = 1;
        echo 'Please enter a city <br>';
    }
    if($province == '')
    {
        $errors = 1;
        echo 'Please select a province <br>';
    }
    if($student1Name == '') //if  team name was not set by user
    { 
        $errors = 1; //set errors flag to 1
        echo 'Please enter student 1 name <br>';
    }
    if($student2Name == '') //if  team name was not set by user
    { 
        $errors = 1; //set errors flag to 1
        echo 'Please enter student 2 name <br>';
    }
    if ($student1Email != $student2Email)
    {
        if(!preg_match($emailPattern, $student1Email))
        {
            $errors = 1;
            echo 'Student 1 - Please enter e-mail in correct format <br>';
        }
        if(!preg_match($emailPattern, $student2Email))
        {
            $errors = 1;
            echo 'Student 2 - Please enter e-mail in correct format <br>';
        }
    }
    else{
        $errors = 1;
        echo 'Student 1 and Student 2 emails must be diferent <br>';
    }


    

    if ($errors == 1){
        echo("<br><br>Please correct the error(s) above.");
    }

    if ($errors == 0)
    {
        $sqlQuery = "

        INSERT INTO `registrations`(`teamName`, `collegeName`, `collegeCity`, `student1`, `student2`) 
        VALUES ('$teamName', '$collegeName', '$collegeCity', '$student1Email', '$student2Email');
        
        ";

        $sqlResult = $db->query($sqlQuery);
        if(!$sqlResult)
        {
            exit($db->error);
        }

        //show the output
        echo(
            "Registration Confirmation <br><br>
            Team Name: $teamName <br>
            College Name: $collegeName <br>
            College Address: $collegeAddress <br>
            $collegeCity <br>
            $province <br>
            Name: $student1Name <br>
            Email: $student1Email <br>
            Name: $student2Name <br>
            Email: $student2Email <br>
            <br><br>
            
            Thank you for registering!"
        );
    }