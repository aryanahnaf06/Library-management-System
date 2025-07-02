<?php
//addserver_page.php

// Include the data_class.php file that contains class definitions and methods.
include("data_class.php");

// Retrieve values from the submitted form using the POST method.
$bookname = $_POST['bookname'];
$bookdetail = $_POST['bookdetail'];
$bookaudor = $_POST['bookaudor'];
$bookpub = $_POST['bookpub'];
$branch = $_POST['branch'];
$bookprice = $_POST['bookprice'];
$bookquantity = $_POST['bookquantity'];

// Check if the book photo has been successfully uploaded.
if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"], "uploads/" . $_FILES["bookphoto"]["name"])) {

    // Get the filename of the uploaded book photo.
    $bookpic = $_FILES["bookphoto"]["name"];

    // Create an instance of the data class.
    $obj = new data();

    // Establish a connection to the database.
    $obj->setconnection();

    // Call the addbook method of the data class to add the book to the database.
    $obj->addbook($bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity);
} else {
    // Display an error message if the file upload was not successful.
    echo "File not uploaded";
}
?>
