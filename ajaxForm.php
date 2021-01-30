<?php
//start session
session_start(); // get access to $_SESSION[]
include('includes/db_connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Demo Day</title>

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/css.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

        $(document).ready(function(){
            $('#myForm').on('submit', function(e){
                //stop the form from submitting
                e.preventDefault();
                
                //fetch fields
                var teamName = $('#teamName').val();
                var collegeName = $('#collegeName').val();
                var collegeAddress = $('#collegeAddress').val();
                var collegeCity = $('#collegeCity').val();
                var province = $('#province').val();
                var student1Name = $('#student1Name').val();
                var student1Email = $('#student1Email').val();
                var student2Name = $('#student2Name').val();
                var student2Email = $('#student2Email').val();

                // ajax call
                $.ajax({
                    type    :  'POST',
                    url     :  'ajaxprocess.php',
                    data    :  {
                        teamName : teamName,
                        collegeName : collegeName,
                        collegeAddress : collegeAddress,
                        collegeCity : collegeCity,
                        province : province,
                        student1Name : student1Name,
                        student1Email : student1Email,
                        student2Name : student2Name,
                        student2Email : student2Email
                    },
                    success : function(processeddata){
                        $('#formResult').html(processeddata);
                        if (!processeddata.includes("error(s)")){
                            document.getElementById("myForm").reset();
                        }         
                    }
                    
                });
            });
        });
    </script>

</head>
<body>
    <header>
        <?php include('includes/nav.php'); ?>
    </header>
    
    <main>
        
        <form name="myForm" id="myForm" method="POST" onsubmit="return formsubmit();" action="">
            <label for="teamName">Team Name</label>
            <input id="teamName" placeholder="Team Name" class="textInput" type="text" name="teamName"><br/>

            <label for="collegeName">College Name</label>
            <input id="collegeName" placeholder="College Name" class="textInput" type="text" name="collegeName"><br/>
    
            <label for="collegeAddress">College Address</label>
            <input id="collegeAddress" placeholder="Street Address" class="textInput" type="text" name="collegeAddress"><br/>
    
            <label for="collegeCity">City</label>
            <input id="collegeCity" placeholder="City" class="textInput" type="text" name="collegeCity"><br/>
    
            <label for="">Province</label>
            <select name="province" id="province" class="textInput">
                <option value="">----- Select -----</option>
                <option value="AB">Alberta</option>
                <option value="BC">British Colombia</option>
                <option value="MB">Manitoba</option>
                <option value="NB">New Brunswick</option>
                <option value="NL">Newfoundland and Labrador</option>
                <option value="NT">Northwest Territories</option>
                <option value="NS">Nova Scotia</option>
                <option value="NU">Nunavut</option>
                <option value="ON">Ontario</option>
                <option value="PE">Prince Edward Island</option>
                <option value="QC">Quebec</option>
                <option value="SK">Saskatchewan</option>
                <option value="YT">Yukon</option>
            </select><br/>

            <label for="student1Name">Student 1 Name</label>
            <input id="student1Name" placeholder="Student 1 Name" class="textInput" type="text" name="student1Name"><br/>
        
            <label for="student1Email">Student Email 1</label>
            <input id="student1Email" placeholder="email@domain.com" class="textInput" type="email" name="student1Email"><br/>

            <label for="student2Name">Student 2 Name</label>
            <input id="student2Name" placeholder="Student 2 Name" class="textInput" type="text" name="student2Name"><br/>

            <label for="student2Email">Student Email 2</label>
            <input id="student2Email" placeholder="email@domain.com" class="textInput" type="email" name="student2Email"><br/>
        
           
  
            <br/><br/>
            <input type="submit" value="Submit" class="btn" name="submit">
            <p id="errors">
                
        </form>

            <div class="formData">
                <p id="formResult"></p>
            </div>
        <div class="clear"></div>
    </main>   
</body>
</html>