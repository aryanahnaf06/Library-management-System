<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>

@keyframes changeBackground {
    0% {
        background-image: url('images/library.jpg'); /* Initial background image */
    }
    25% {
        background-image: url('images/library1.jpg'); /* Background image after 25% of animation */
    }
    50% {
        background-image: url('images/library2.jpg'); /* Background image after 50% of animation */
    }
    75% {
        background-image: url('images/library4.jpg'); /* Background image after 75% of animation */
    }
    100% {
        background-image: url('images/library8.jpg'); /* Final background image */
    }
}

body {
    font-family: 'Roboto';
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    animation: changeBackground 10s infinite; /* Apply the animation to the body */
}

    .greenbtn {
    transition: background-color 0.4s, color 0.4s; /* Add transition for smooth effect */
}

.greenbtn:hover {
    background-color: #16DE52; /* Change background color on hover */
    color: white; /* Change text color on hover */
}


            .innerright,label {
    color: rgb(16, 170, 16);
    font-weight:bold;
}
.container,
.row,
.imglogo {
    margin:auto;
}

.innerdiv {
    text-align: center;
    /* width: 500px; */
    margin: 100px;
}
input{
    margin-left:20px;
}
.leftinnerdiv {
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
}

.innerright {
    background-color: lightgreen;
}

.greenbtn {
    background-color: lightgray;
    color: black;
    width: 95%;
    height: 40px;
    margin-top: 8px;
}

.greenbtn,
a {
    text-decoration: none;
    color: black;
    font-size: large;
}

th{
    background-color: #16DE52;
    color: black;
}
td{
    background-color:#b1fec7;
    color: black;
}
td, a{
    color:black;
}
    </style>
    <body>

    <?php
   include("data_class.php");
    ?>
<div class="container">
    <div class="innerdiv">
        <div class="row"><img class="imglogo" src="images/logo1.png"/></div>
        <div class="leftinnerdiv">
            <br>
            <!-- Button for opening the "My Account" section -->
            <Button class="greenbtn" onclick="openpart('myaccount')">
                <img class="icons" src="images/icon/profile.png" width="30px" height="30px"/> My Account
            </Button>
            <!-- Button for opening the "Request Book" section -->
            <Button class="greenbtn" onclick="openpart('requestbook')">
                <img class="icons" src="images/icon/book.png" width="30px" height="30px"/> Request Book
            </Button>
            <!-- Button for opening the "Book Report" section -->
            <Button class="greenbtn" onclick="openpart('issuereport')">
                <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> Book Report
            </Button>
            <!-- Button for logging out -->
            <a href="index.php">
                <Button class="greenbtn">
                    <img class="icons" src="images/icon/logout.png" width="30px" height="30px"/> LOGOUT
                </Button>
            </a>
        </div>

        <div class="rightinnerdiv">   
            <!-- Section for displaying user account information -->
            <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
                <Button class="greenbtn" >My Account</Button>
                <?php
                // Create an instance of the "data" class
                $u=new data;
                $u->setconnection();
                // Retrieve user details using the "userdetail" method
                $u->userdetail($userloginid);
                $recordset=$u->userdetail($userloginid);
                foreach($recordset as $row){
                    $id= $row[0];
                    $name= $row[1];
                    $email= $row[2];
                    $pass= $row[3];
                    $type= $row[4];
                }
                // Display user account information
                ?>
                <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
                <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
                <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>
            </div>
        </div>

        <div class="rightinnerdiv">   
            <!-- Section for displaying book issue records -->
            <div id="issuereport" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
                <Button class="greenbtn" >BOOK RECORD</Button>
                <?php
                // Create an instance of the "data" class
                $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
                $u=new data;
                $u->setconnection();
                // Retrieve issue book records using the "getissuebook" method
                $u->getissuebook($userloginid);
                $recordset=$u->getissuebook($userloginid);
                // Display issue book records in a table
                $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
                <th>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";
                foreach($recordset as $row){
                    $table.="<tr>";
                    $table.="<td>$row[0]</td>";
                    $table.="<td>$row[2]</td>";
                    $table.="<td>$row[3]</td>";
                    $table.="<td>$row[6]</td>";
                    $table.="<td>$row[7]</td>";
                    // Button for returning the issued book
                    $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                    $table.="</tr>";
                }
                $table.="</table>";
                echo $table;
                ?>
            </div>
        </div>

        <div class="rightinnerdiv">   
            <!-- Section for returning a book -->
            <div id="return" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
                <Button class="greenbtn" >Return Book</Button>
                <?php
                // Create an instance of the "data" class
                $u=new data;
                $u->setconnection();
                // Return the book using the "returnbook" method
                $u->returnbook($returnid);
                $recordset=$u->returnbook($returnid);
                ?>
            </div>
        </div>

        <div class="rightinnerdiv">   
            <!-- Section for requesting a book -->
            <div id="requestbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
                <Button class="greenbtn" >Request Book</Button>
                <?php
                // Create an instance of the "data" class
                $u=new data;
                $u->setconnection();
                // Retrieve books available for issuing using the "getbookissue" method
                $u->getbookissue();
                $recordset=$u->getbookissue();
                // Display available books for requesting in a table
                $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
                <th>Image</th><th>Book Name</th><th>Book Author</th><th>Branch</th><th>Price</th></th><th>Request Book</th></tr>";
                foreach($recordset as $row){
                    $table.="<tr>";
                    $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
                    $table.="<td>$row[2]</td>";
                    $table.="<td>$row[4]</td>";
                    $table.="<td>$row[6]</td>";
                    $table.="<td>$row[7]</td>";
                    // Button for requesting the book
                    $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary'>Request Book</button></a></td>";
                    $table.="</tr>";
                }
                $table.="</table>";
                echo $table;
                ?>
            </div>
        </div>
    </div>
</div>



<script>
// Function to open a specific portion
function openpart(portion) {
    // Get all elements with class "portion"
    var x = document.getElementsByClassName("portion");
    
    // Loop through all elements
    for (var i = 0; i < x.length; i++) {
        // Hide the current portion by setting its display to "none"
        x[i].style.display = "none";
    }
    
    // Display the selected portion by setting its display to "block"
    document.getElementById(portion).style.display = "block";
}
</script>

    </body>
</html>