<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
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


/* Define additional styles for green buttons with transitions */

.greenbtn {
    transition: background-color 0.4s, color 0.4s; /* Add transition for smooth effect */
}

/* Define styles for green buttons when hovered */
.greenbtn:hover {
    background-color: #16DE52; /* Change background color on hover */
    color: white; /* Change text color on hover */
}

/* Style for elements with class 'innerright' and 'label' */
.innerright, label {
    color: rgb(16, 170, 16); /* Set text color */
    font-weight: bold; /* Set font weight */
}

/* Styling for container, rows, and logo image */
.container,
.row,
.imglogo {
    margin: auto; /* Center align horizontally */
}

/* Style for inner content div */
.innerdiv {
    text-align: center; /* Center-align text */
    margin: 100px; /* Add margin around the div */
}

/* Style for input elements */
input {
    margin-left: 20px; /* Add left margin to inputs */
}

/* Style for left-aligned inner content div */
.leftinnerdiv {
    float: left; /* Float the div to the left */
    width: 25%; /* Set width to 25% of container */
}

/* Style for right-aligned inner content div */
.rightinnerdiv {
    float: right; /* Float the div to the right */
    width: 75%; /* Set width to 75% of container */
}

/* Style for elements with class 'innerright' */
.innerright {
    background-color: #f3bd7e; /* Set background color */
}

/* Styling for green buttons with default appearance */
.greenbtn {
    background-color: #ffe3e3; /* Set background color */
    color: black; /* Set text color */
    width: 95%; /* Set width to 95% */
    height: 40px; /* Set height to 40px */
    margin-top: 8px; /* Add top margin */
}

/* Styling for green buttons and links */
.greenbtn,
a {
    text-decoration: none; /* Remove text decoration */
    color: black; /* Set text color */
    font-size: large; /* Set font size to 'large' */
}

/* Styling for table header cells */
th {
    background-color: #16DE52; /* Set background color */
    color: black; /* Set text color */
}

/* Styling for table data cells */
td {
    background-color: #b1fec7; /* Set background color */
    color: black; /* Set text color */
}

/* Styling for table data cells and links */
td, a {
    color: black; /* Set text color */
}

/* Styling for label elements */
label {
    margin-left: 50px; /* Add left margin */
    padding-top: 10px; /* Add top padding */
    font-size: 18px; /* Set font size */
    color: rgb(51, 51, 51); /* Set text color */
}
   </style>
    <body >

    <?php
    // Include the "data_class.php" file, which likely contains data-related functions
    include("data_class.php");

    // Initialize an empty message variable
    $msg = "";

    // Check if the "msg" parameter has been sent via HTTP request
    if(!empty($_REQUEST['msg'])){
        // If "msg" parameter is present, store its value in the $msg variable
        $msg = $_REQUEST['msg'];
    }

    // Check the value of the $msg variable
    if($msg == "done"){
        // If $msg is "done", display a success alert using Bootstrap styles
        echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
    }
    elseif($msg == "fail"){
        // If $msg is "fail", display a failure alert using Bootstrap styles
        echo "<div class='alert alert-danger' role='alert'>Fail</div>";
    }
?>
        <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/logo1.png"/></div>
            <div class="leftinnerdiv">
    <!-- Left navigation buttons -->
    <!-- These buttons are used for navigation and triggering content display -->

    <!-- Button to open the 'addbook' section -->
    <Button class="greenbtn" onclick="openpart('addbook')">
        <img class="icons" src="images/icon/book.png" width="30px" height="30px"/> ADD BOOK
    </Button>

    <!-- Button to open the 'bookreport' section -->
    <Button class="greenbtn" onclick="openpart('bookreport')">
        <img class="icons" src="images/icon/open-book.png" width="30px" height="30px"/> BOOK REPORT
    </Button>

    <!-- Button to open the 'bookrequestapprove' section -->
    <Button class="greenbtn" onclick="openpart('bookrequestapprove')">
        <img class="icons" src="images/icon/interview.png" width="30px" height="30px"/> BOOK REQUESTS
    </Button>

    <!-- Button to open the 'addperson' section -->
    <Button class="greenbtn" onclick="openpart('addperson')">
        <img class="icons" src="images/icon/add-user.png" width="30px" height="30px"/> ADD STUDENT
    </Button>

    <!-- Button to open the 'studentrecord' section -->
    <Button class="greenbtn" onclick="openpart('studentrecord')">
        <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> STUDENT REPORT
    </Button>

    <!-- Button to open the 'issuebook' section -->
    <Button class="greenbtn" onclick="openpart('issuebook')">
        <img class="icons" src="images/icon/test.png" width="30px" height="30px"/> ISSUE BOOK
    </Button>

    <!-- Button to open the 'issuebookreport' section -->
    <Button class="greenbtn" onclick="openpart('issuebookreport')">
        <img class="icons" src="images/icon/checklist.png" width="30px" height="30px"/> ISSUE REPORT
    </Button>

    <!-- Link to 'credits.php' with a button style -->
    <a href="credits.php">
        <Button class="greenbtn">
            <img class="icons" src="images/icon/profile.png" width="30px" height="30px"/> CREDITS
        </Button>
    </a>

    <!-- Link to 'index.php' with a button style (used for logging out) -->
    <a href="index.php">
        <Button class="greenbtn">
            <img class="icons" src="images/icon/book.png" width="30px" height="30px"/> LOGOUT
        </Button>
    </a>
</div>


<div class="rightinnerdiv">
    <!-- Section for approving book requests -->
    <div id="bookrequestapprove" class="innerright portion" style="display:none">
        <!-- Display a button for book request approval -->
        <Button class="greenbtn">BOOK REQUEST APPROVE</Button>

        <?php
        // Create an instance of the 'data' class
        $u = new data;
        // Establish a database connection
        $u->setconnection();
        // Retrieve book request data
        $u->requestbookdata();
        // Get the retrieved book request data
        $recordset = $u->requestbookdata();

        // Create an HTML table to display the book request data
        $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'>
            <tr><th style='padding: 8px;'>Person Name</th><th>Person Type</th><th>Book Name</th><th>Days</th><th>Approve</th></tr>";

        // Loop through the retrieved data to populate the table rows
        foreach($recordset as $row){
            $table .= "<tr>";
            // Display the person's name, type, and book name
            "<td>$row[0]</td>";
            "<td>$row[1]</td>";
            "<td>$row[2]</td>";
            // Display the number of days and an 'Approve' button linked to an approval action
            $table .= "<td>$row[3]</td>";
            $table .= "<td>$row[4]</td>";
            $table .= "<td>$row[5]</td>";
            $table .= "<td>$row[6]</td>";
            // Display a button to approve the book request
            $table .= "<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'>
                <button type='button' class='btn btn-primary'>Approve?</button></a></td>";
            $table .= "</tr>";
        }
        // Close the table tag
        $table .= "</table>";

        // Display the generated table
        echo $table;
        ?>
    </div>
</div>


<div class="rightinnerdiv">   
    <!-- This div contains the form to add a new book -->
    <div id="addbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
        <!-- Button to initiate the process of adding a new book -->
        <Button class="greenbtn" >ADD NEW BOOK</Button>
        <br>
        <!-- Form for adding a new book -->
        <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
            <!-- Book name input field -->
            <label>Book Name:</label><input type="text" name="bookname"/>
            </br>
            <!-- Book detail input field -->
            <label>Detail:</label><input type="text" name="bookdetail"/></br>
            <!-- Book author input field -->
            <label>Autor:</label><input type="text" name="bookaudor"/></br>
            <!-- Book publication input field -->
            <label>Publication</label><input type="text" name="bookpub"/></br>
            <!-- Branch selection (radio buttons) -->
            <div>
                <label>Branch:</label>
                <input type="radio" name="branch" value="other"/>RomCom
                <input type="radio" name="branch" value="BSIT"/>Comedy
                <div style="margin-left:80px">
                    <input type="radio" name="branch" value="BSCS"/>Novel
                    <input type="radio" name="branch" value="BSSE"/>Sci-Fi
                </div>
            </div>
            <!-- Book price input field -->
            <label>Price:</label><input type="number" name="bookprice"/></br>
            <!-- Book quantity input field -->
            <label>Quantity:</label><input type="number" name="bookquantity"/></br>
            <!-- Book photo upload field -->
            <label>Book Photo</label><input type="file" name="bookphoto"/></br>
            </br>
            <!-- Submit button for adding the book -->
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>
        </form>
    </div>
</div>



<div class="rightinnerdiv">
    <!-- Container for adding a new person -->
    <div id="addperson" class="innerright portion" style="display:none">
        <!-- Title for the section -->
        <Button class="greenbtn" >ADD Person</Button>
        <!-- Form for adding a new person -->
        <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <!-- Input field for the person's name -->
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <!-- Input field for the person's password -->
            <label>Password:</label><input type="password" name="addpass"/>
            </br>
            <!-- Input field for the person's email -->
            <label>Email:</label><input  type="email" name="addemail"/></br>
            <!-- Dropdown to choose the type of person (student or teacher) -->
            <label for="type">Choose type:</label>
            <select name="type" >
                <option value="student">student</option>
                <option value="teacher">teacher</option>
            </select>
            <!-- Submit button to add the person -->
            <input type="submit" value="SUBMIT"/>
        </form>
    </div>
</div>


<div class="rightinnerdiv">
    <!-- Container for displaying student records -->
    <div id="studentrecord" class="innerright portion" style="display:none">
        <!-- Button to indicate the purpose of this section -->
        <Button class="greenbtn">Student RECORD</Button>

        <?php
        // Create an instance of the 'data' class
        $u = new data;
        // Establish a database connection
        $u->setconnection();
        // Retrieve user data from the database
        $u->userdata();
        // Get the recordset containing user data
        $recordset = $u->userdata();

        // Create a table to display user records
        $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'>
                    <tr>
                        <th style='padding: 8px;'>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                    </tr>";

        // Loop through each record in the recordset
        foreach ($recordset as $row) {
            $table .= "<tr>";
            // Display user data in the table cells
            "<td>$row[0]</td>"; // User ID (not displayed)
            $table .= "<td>$row[1]</td>"; // User's Name
            $table .= "<td>$row[2]</td>"; // User's Email
            $table .= "<td>$row[4]</td>"; // User's Type
            // Add a cell for potential deletion (not shown)
            // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
            $table .= "</tr>";
        }
        // Close the table
        $table .= "</table>";

        // Display the table of user records
        echo $table;
        ?>
    </div>
</div>








<div class="rightinnerdiv">
    <!-- This div contains a portion for displaying issued book records -->
    <div id="issuebookreport" class="innerright portion" style="display:none">
        <!-- Display a button to toggle the display of the issued book records -->
        <Button class="greenbtn">Issue Book Record</Button>

        <?php
        // Create an instance of the "data" class
        $u = new data;
        // Set up the database connection
        $u->setconnection();
        // Retrieve issue report data using the "issuereport" method
        $recordset = $u->issuereport();

        // Create an HTML table to display the issue report data
        $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'>
                    <tr><th style='padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th>
                    <th>Return Date</th><th>Fine</th><th>Issue Type</th></tr>";

        // Loop through each record in the issue report
        foreach ($recordset as $row) {
            // Add a new row to the table
            $table .= "<tr>";
            // Populate cells with data from the current record
            $table .= "<td>$row[0]</td>";
            $table .= "<td>$row[2]</td>";
            $table .= "<td>$row[3]</td>";
            $table .= "<td>$row[6]</td>";
            $table .= "<td>$row[7]</td>";
            $table .= "<td>$row[8]</td>";
            // Add more cells if needed...
            $table .= "</tr>";
        }
        // Close the table
        $table .= "</table>";

        // Display the generated table with issue report data
        echo $table;
        ?>

    </div>
</div>








           

<!-- Display the "issue book" section -->
<div class="rightinnerdiv">
    <div id="issuebook" class="innerright portion" style="display:none">
        <!-- Display the "ISSUE BOOK" button -->
        <Button class="greenbtn">ISSUE BOOK</Button>
        <!-- Form to submit an issue book request -->
        <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <!-- Label and dropdown to choose a book for issuing -->
            <label for="book">Choose Book:</label>
            <select name="book">
                <?php
                // Create a new "data" instance and set up the database connection
                $u = new data;
                $u->setconnection();
                // Retrieve and display books available for issuing
                $u->getbookissue();
                $recordset = $u->getbookissue();
                foreach ($recordset as $row) {
                    echo "<option value='" . $row[2] . "'>" . $row[2] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Label and dropdown to select a student for issuing -->
            <label for="Select Student">Select Student:</label>
            <select name="userselect">
                <?php
                // Create a new "data" instance and set up the database connection
                $u = new data;
                $u->setconnection();
                // Retrieve and display user data for selecting a student
                $u->userdata();
                $recordset = $u->userdata();
                foreach ($recordset as $row) {
                    $id = $row[0];
                    echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Input field for entering the number of days -->
            <label>Days</label> <input type="number" name="days"/>
            <!-- Submit button to submit the issue book request -->
            <input type="submit" value="SUBMIT"/>
        </form>
    </div>
</div>






<div class="rightinnerdiv">
    <!-- This div contains the book details section -->
    <div id="bookdetail" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {
        $viewid = $_REQUEST['viewid'];
    } else {
        echo "display:none";
    } ?>">
        <!-- Display a green button for BOOK DETAIL -->
        <Button class="greenbtn">BOOK DETAIL</Button>
        </br>
        <?php
        // Create an instance of the "data" class
        $u = new data;
        // Set up the database connection
        $u->setconnection();
        // Retrieve book details based on the provided viewid
        $u->getbookdetail($viewid);
        $recordset = $u->getbookdetail($viewid);
        foreach ($recordset as $row) {
            // Extract book details from the retrieved record
            $bookid = $row[0];
            $bookimg = $row[1];
            $bookname = $row[2];
            $bookdetail = $row[3];
            $bookauthour = $row[4];
            $bookpub = $row[5];
            $branch = $row[6];
            $bookprice = $row[7];
            $bookquantity = $row[8];
            $bookava = $row[9];
            $bookrent = $row[10];
        }
        ?>
        <!-- Display book image -->
        <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px'
            src="uploads/<?php echo $bookimg ?>" />
        </br>
        <!-- Display book details -->
        <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
        <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
        <p style="color:black"><u>Book Authour:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
        <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
        <p style="color:black"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
        <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
        <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
        <p style="color:black"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>
    </div>
</div>







 <!--  The Work for BOOK REPORT Button  -->
            <div class="rightinnerdiv">   
            <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >BOOK RECORD</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                 $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
            // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>



        </div>
        </div>
        

     
<script>
    // Function to open a specific portion of content
    function openpart(portion) {
        // Get all elements with the class "portion"
        var i;
        var x = document.getElementsByClassName("portion");

        // Loop through each element with class "portion"
        for (i = 0; i < x.length; i++) {
            // Hide the currently displayed portions by setting their display to "none"
            x[i].style.display = "none";
        }

        // Display the selected portion by setting its display to "block"
        document.getElementById(portion).style.display = "block";
    }
</script>

    </body>
</html>