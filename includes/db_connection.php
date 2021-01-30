<?php

// DB connection needs servername, username, password, database name
//error_reporting(0); // hides detailed PHP errors and warnings. Only set when going to production. This helps with security as the users do not see detailed information about your server.
$servername = 'localhost'; //'127.0.0.1'; // our server is local
$username = 'root'; // default admin 
$password = ''; //default admin pass is blank
$dbname = 'registration'; // DB that we created

// create a connection
$db = new mysqli($servername, $username, $password, $dbname); // connects to the database and return a mysqli object for executing queries.

// check for errors
if($db->connect_error)
{
    die('Something is not working. Please come back later....');
}