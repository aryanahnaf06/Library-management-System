<?php
// Include the data_class.php file that contains class definitions and methods.
include("data_class.php");

// Retrieve values from the submitted form using the POST method.
$addnames = $_POST['addname'];   // Get the name of the user to be added.
$addpass = $_POST['addpass'];     // Get the password for the new user.
$addemail = $_POST['addemail'];   // Get the email address of the new user.
$type = $_POST['type'];           // Get the user type (e.g., student, teacher).

// Create an instance of the data class.
$obj = new data();

// Establish a connection to the database.
$obj->setconnection();

// Call the addnewuser method of the data class to add a new user to the database.
$obj->addnewuser($addnames, $addpass, $addemail, $type);
?>
