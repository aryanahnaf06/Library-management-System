<?php include("db.php");

class data extends db {

    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookaudor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;

    private $name;
    private $pasword;
    private $email;



  // Constructor method
    function __construct() {
        // echo " constructor ";
        echo "</br></br>";
    }

// Method for adding a new user to the database
function addnewuser($name, $pasword, $email, $type) {
    // Store the provided user data into class properties
    $this->name = $name;
    $this->pasword = $pasword;
    $this->email = $email;
    $this->type = $type;

    // Define the SQL query to insert user data into the 'userdata' table
    $q = "INSERT INTO userdata(id, name, email, pass, type) VALUES('', '$name', '$email', '$pasword', '$type')";

    // Try executing the SQL query using the database connection
    if ($this->connection->exec($q)) {
        // If the query execution is successful, redirect to admin dashboard with a success message
        header("Location: admin_service_dashboard.php?msg=New Add done");
    } else {
        // If the query execution fails, redirect to admin dashboard with a failure message
        header("Location: admin_service_dashboard.php?msg=Register Fail");
    }
}

// Method for user login
function userLogin($t1, $t2) {
    // SQL query to retrieve user data based on provided email and password
    $q = "SELECT * FROM userdata WHERE email='$t1' AND pass='$t2'";
    
    // Execute the SQL query using the database connection
    $recordSet = $this->connection->query($q);
    
    // Get the number of rows returned by the query
    $result = $recordSet->rowCount();
    
    // Check if there's at least one matching record
    if ($result > 0) {
        // Loop through the fetched records
        foreach ($recordSet->fetchAll() as $row) {
            // Get the user's ID from the fetched record
            $logid = $row['id'];
            
            // Redirect the user to the otheruser_dashboard.php page with the user's ID as a parameter
            header("location: otheruser_dashboard.php?userlogid=$logid");
        }
    } else {
        // If no matching records were found, redirect to the index.php page with an error message
        header("location: index.php?msg=Invalid Credentials");
    }
}

// Method for admin login
function adminLogin($t1, $t2) {
    // Construct the SQL query to retrieve admin data based on provided email and password
    $q = "SELECT * FROM admin WHERE email='$t1' AND pass='$t2'";
    
    // Execute the SQL query using the database connection and store the result set
    $recordSet = $this->connection->query($q);
    
    // Get the number of rows returned by the query (number of matching admin records)
    $result = $recordSet->rowCount();

    // Check if there are matching admin records
    if ($result > 0) {
        // Loop through the fetched records
        foreach($recordSet->fetchAll() as $row) {
            // Get the admin's ID from the fetched row
            $logid = $row['id'];
            // Redirect to the admin service dashboard page with the admin's log ID as a parameter
            header("location: admin_service_dashboard.php?logid=$logid");
        }
    } else {
        // If no matching admin records, redirect to the index page with an error message
        header("location: index.php?msg=Invalid Credentials");
    }
}



// Method for adding a new book to the database
function addbook($bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity) {
    // Assign the provided values to corresponding class properties
    $this->$bookpic = $bookpic;
    $this->bookname = $bookname;
    $this->bookdetail = $bookdetail;
    $this->bookaudor = $bookaudor;
    $this->bookpub = $bookpub;
    $this->branch = $branch;
    $this->bookprice = $bookprice;
    $this->bookquantity = $bookquantity;

    // Create an SQL query to insert book data into the 'book' table
    $q = "INSERT INTO book (id, bookpic, bookname, bookdetail, bookaudor, bookpub, branch, bookprice, bookquantity, bookava, bookrent) 
          VALUES ('', '$bookpic', '$bookname', '$bookdetail', '$bookaudor', '$bookpub', '$branch', '$bookprice', '$bookquantity', '$bookquantity', 0)";

    // Execute the query using the database connection and check for success
    if ($this->connection->exec($q)) {
        // Redirect to the admin dashboard with a success message
        header("Location:admin_service_dashboard.php?msg=done");
    } else {
        // Redirect to the admin dashboard with a failure message
        header("Location:admin_service_dashboard.php?msg=fail");
    }
}



    private $id;


// Method to retrieve issued books for a user
function getissuebook($userloginid) {
    // Initialize variables to hold fine and return date information
    $newfine = "";
    $issuereturn = "";

    // Prepare a SQL query to select issued books for the given user
    $q = "SELECT * FROM issuebook WHERE userid='$userloginid'";
    $recordSetss = $this->connection->query($q); // Execute the query

    // Loop through each record fetched from the query result
    foreach ($recordSetss->fetchAll() as $row) {
        $issuereturn = $row['issuereturn'];
        $fine = $row['fine'];
        $newfine = $fine;

        // Note: The commented line below calculates a new book rent value, but it's not used in this context.
        // $newbookrent=$row['bookrent']+1;
    }

    // Get the current date in the format 'd/m/Y'
    $getdate = date("d/m/Y");

    // Check if the return date is earlier than the current date
    if ($issuereturn < $getdate) {
        // Update the 'fine' column in the 'issuebook' table with the calculated fine value
        $q = "UPDATE issuebook SET fine='$newfine' WHERE userid='$userloginid'";

        // Check if the fine update query executed successfully
        if ($this->connection->exec($q)) {
            // Retrieve updated issue book data and return it
            $q = "SELECT * FROM issuebook WHERE userid='$userloginid'";
            $data = $this->connection->query($q);
            return $data;
        } else {
            // If fine update failed, return the original issue book data
            $q = "SELECT * FROM issuebook WHERE userid='$userloginid'";
            $data = $this->connection->query($q);
            return $data;
        }
    } else {
        // If return date is not earlier, retrieve and return the original issue book data
        $q = "SELECT * FROM issuebook WHERE userid='$userloginid'";
        $data = $this->connection->query($q);
        return $data;
    }
}




// Retrieve all book records from the database
function getbook() {
    // SQL query to select all columns from the 'book' table
    $q = "SELECT * FROM book ";
    // Execute the query using the connection object and store the result
    $data = $this->connection->query($q);
    // Return the result (data containing book records)
    return $data;
}

// Retrieve books that are available for issuing
function getbookissue() {
    // SQL query to select all columns from the 'book' table where 'bookava' (available) is not 0
    $q = "SELECT * FROM book where bookava != 0 ";
    // Execute the query using the connection object and store the result
    $data = $this->connection->query($q);
    // Return the result (data containing available book records)
    return $data;
}

// Retrieve all user data from the 'userdata' table
function userdata() {
    // SQL query to select all columns from the 'userdata' table
    $q = "SELECT * FROM userdata ";
    // Execute the query using the connection object and store the result
    $data = $this->connection->query($q);
    // Return the result (data containing user records)
    return $data;
}

// Retrieve detailed information about a specific book
function getbookdetail($id) {
    // SQL query to select all columns from the 'book' table where 'id' matches the provided parameter
    $q = "SELECT * FROM book where id ='$id'";
    // Execute the query using the connection object and store the result
    $data = $this->connection->query($q);
    // Return the result (data containing details of the specified book)
    return $data;
}

// Retrieve detailed information about a specific user
function userdetail($id) {
    // SQL query to select all columns from the 'userdata' table where 'id' matches the provided parameter
    $q = "SELECT * FROM userdata where id ='$id'";
    // Execute the query using the connection object and store the result
    $data = $this->connection->query($q);
    // Return the result (data containing details of the specified user)
    return $data;
}




// Method to request a book by a user
function requestbook($userid, $bookid) {

    // Query to retrieve book information based on the provided book id
    $q = "SELECT * FROM book where id='$bookid'";
    $recordSetss = $this->connection->query($q);

    // Query to retrieve user information based on the provided user id
    $q = "SELECT * FROM userdata where id='$userid'";
    $recordSet = $this->connection->query($q);

    // Retrieve user information from the result set
    foreach ($recordSet->fetchAll() as $row) {
        $username = $row['name'];
        $usertype = $row['type'];
    }

    // Retrieve book name from the book information result set
    foreach ($recordSetss->fetchAll() as $row) {
        $bookname = $row['bookname'];
    }

    // Determine the number of days for which the book will be issued based on user type
    if ($usertype == "student") {
        $days = 7; // 7 days for students
    } elseif ($usertype == "teacher") {
        $days = 21; // 21 days for teachers
    }

    // Query to insert the book request information into the requestbook table
    $q = "INSERT INTO requestbook (id,userid,bookid,username,usertype,bookname,issuedays)VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

    // Execute the query
    if ($this->connection->exec($q)) {
        // Redirect to the user's dashboard with a success message
        header("Location:otheruser_dashboard.php?userlogid=$userid");
    } else {
        // Redirect to the user's dashboard with a failure message
        header("Location:otheruser_dashboard.php?msg=fail");
    }
}



function returnbook($id){
    // Initialize variables to store information about the book return
    $fine = "";
    $bookava = "";
    $issuebook = "";
    $bookrentel = "";

    // Retrieve information about the issued book using its ID
    $q = "SELECT * FROM issuebook where id='$id'";
    $recordSet = $this->connection->query($q);

    // Extract relevant data from the issued book record
    foreach($recordSet->fetchAll() as $row) {
        $userid = $row['userid'];
        $issuebook = $row['issuebook'];
        $fine = $row['fine'];
    }

    // Check if the fine for the issued book is zero
    if($fine == 0) {
        // Retrieve information about the book from the 'book' table
        $q = "SELECT * FROM book where bookname='$issuebook'";
        $recordSet = $this->connection->query($q);

        // Update book availability and rental count
        foreach($recordSet->fetchAll() as $row) {
            $bookava = $row['bookava'] + 1; // Increment available books
            $bookrentel = $row['bookrent'] - 1; // Decrement rented books
        }

        // Update book availability and rental count in the 'book' table
        $q = "UPDATE book SET bookava='$bookava', bookrent='$bookrentel' where bookname='$issuebook'";
        $this->connection->exec($q);

        // Delete the issued book record from the 'issuebook' table
        $q = "DELETE from issuebook where id=$id and issuebook='$issuebook' and fine='0' ";
        if($this->connection->exec($q)) {
            // Redirect to the user's dashboard after successful book return
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        }

    }

}

// Method to delete user data based on user ID
function delteuserdata($id){
    // Construct the DELETE query to remove user data with the specified ID
    $q = "DELETE from userdata where id='$id'";
    
    // Execute the DELETE query using the database connection
    if($this->connection->exec($q)){
        // If the deletion was successful, redirect to the admin dashboard with a success message
        header("Location:admin_service_dashboard.php?msg=done");
    }
    else{
        // If the deletion failed, redirect to the admin dashboard with a failure message
        header("Location:admin_service_dashboard.php?msg=fail");
    }
}

// Method to delete a book based on book ID
function deletebook($id){
    // Construct the DELETE query to remove book data with the specified ID
    $q = "DELETE from book where id='$id'";
    
    // Execute the DELETE query using the database connection
    if($this->connection->exec($q)){
        // If the deletion was successful, redirect to the admin dashboard with a success message
        header("Location:admin_service_dashboard.php?msg=done");
    }
    else{
        // If the deletion failed, redirect to the admin dashboard with a failure message
        header("Location:admin_service_dashboard.php?msg=fail");
    }
}

    // Function to retrieve issue reports from the database
    function issuereport(){
        // SQL query to select all records from the "issuebook" table
        $q = "SELECT * FROM issuebook ";
        // Execute the query using the database connection and store the result in $data
        $data = $this->connection->query($q);
        // Return the result (a collection of issue reports)
        return $data;
    }

    // Function to retrieve request book data from the database
    function requestbookdata(){
        // SQL query to select all records from the "requestbook" table
        $q = "SELECT * FROM requestbook ";
        // Execute the query using the database connection and store the result in $data
        $data = $this->connection->query($q);
        // Return the result (a collection of requested books)
        return $data;
    }


// This method is responsible for approving the issuance of a requested book.
function issuebookapprove($book, $userselect, $days, $getdate, $returnDate, $redid) {
    // Set instance properties with passed values
    $this->$book = $book;
    $this->$userselect = $userselect;
    $this->$days = $days;
    $this->$getdate = $getdate;
    $this->$returnDate = $returnDate;

    // Query the database to retrieve book details based on the provided book name
    $q = "SELECT * FROM book WHERE bookname='$book'";
    $recordSetss = $this->connection->query($q);

    // Query the database to retrieve user details based on the provided user name
    $q = "SELECT * FROM userdata WHERE name='$userselect'";
    $recordSet = $this->connection->query($q);
    $result = $recordSet->rowCount();

    if ($result > 0) {
        // Loop through the fetched user details
        foreach ($recordSet->fetchAll() as $row) {
            $issueid = $row['id'];
            $issuetype = $row['type'];
        }

        // Loop through the fetched book details
        foreach ($recordSetss->fetchAll() as $row) {
            $bookid = $row['id'];
            $bookname = $row['bookname'];

            // Update book availability and rental count
            $newbookava = $row['bookava'] - 1;
            $newbookrent = $row['bookrent'] + 1;
        }

        // Update book availability and rental count in the database
        $q = "UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' WHERE id='$bookid'";
        if ($this->connection->exec($q)) {
            // Insert issuance record into the issuebook table
            $q = "INSERT INTO issuebook (userid, issuename, issuebook, issuetype, issuedays, issuedate, issuereturn, fine)
                  VALUES ('$issueid', '$userselect', '$book', '$issuetype', '$days', '$getdate', '$returnDate', '0')";
            if ($this->connection->exec($q)) {
                // Delete the request record from the requestbook table
                $q = "DELETE FROM requestbook WHERE id='$redid'";
                $this->connection->exec($q);
                header("Location:admin_service_dashboard.php?msg=done");
            } else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }
    } else {
        header("location: index.php?msg=Invalid Credentials");
    }
}

    
// Method to issue a book
function issuebook($book, $userselect, $days, $getdate, $returnDate) {
    // Store the provided parameters in corresponding properties
    $this->$book = $book;
    $this->$userselect = $userselect;
    $this->$days = $days;
    $this->$getdate = $getdate;
    $this->$returnDate = $returnDate;

    // Query to retrieve book data based on the provided book name
    $q = "SELECT * FROM book WHERE bookname='$book'";
    // Execute the query and store the result set
    $recordSetss = $this->connection->query($q);

    // Query to retrieve user data based on the provided username
    $q = "SELECT * FROM userdata WHERE name='$userselect'";
    // Execute the query and store the result set
    $recordSet = $this->connection->query($q);
    // Get the number of rows in the result set
    $result = $recordSet->rowCount();

    // Check if user data was found
    if ($result > 0) {
        // Iterate through each user record
        foreach($recordSet->fetchAll() as $row) {
            // Get user's ID and type
            $issueid = $row['id'];
            $issuetype = $row['type'];
        }

        // Iterate through each book record
        foreach($recordSetss->fetchAll() as $row) {
            // Get book ID, name, available quantity, and rented quantity
            $bookid = $row['id'];
            $bookname = $row['bookname'];
            $newbookava = $row['bookava'] - 1;
            $newbookrent = $row['bookrent'] + 1;
        }

        // Update book data: decrease available quantity, increase rented quantity
        $q = "UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' WHERE id='$bookid'";
        if($this->connection->exec($q)) {
            // Insert data into the 'issuebook' table
            $q = "INSERT INTO issuebook (userid, issuename, issuebook, issuetype, issuedays, issuedate, issuereturn, fine) VALUES ('$issueid', '$userselect', '$book', '$issuetype', '$days', '$getdate', '$returnDate', '0')";
            
            // Execute the INSERT query
            if($this->connection->exec($q)) {
                // Redirect to dashboard with success message
                header("Location:admin_service_dashboard.php?msg=done");
            } else {
                // Redirect to dashboard with failure message
                header("Location:admin_service_dashboard.php?msg=fail");
            }
        } else {
            // Redirect to dashboard with failure message
            header("Location:admin_service_dashboard.php?msg=fail");
        }
    } else {
        // Redirect to index page with invalid credentials message
        header("location: index.php?msg=Invalid Credentials");
    }
}

}