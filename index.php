<!DOCTYPE html>
<html>
    <head>
        <<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    </head>
    <style>
 /* Your existing styles here */
 .btnSubmit:hover {
            background-color: #0062cc;
            color: #fff;
        }

        .form-control:hover {
            border-color: #0062cc;
        }

        body {
            animation: changeBackground 20s infinite;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }

        @keyframes changeBackground {
            0%, 100% {
                background-image: url('images/library8.jpg');
            }
            20% {
                background-image: url('images/library.jpg');
            }
            40% {
                background-image: url('images/library9.jpg');
            }
            60% {
                background-image: url('images/library5.jpg');
            }
            80% {
                background-image: url('images/library6.jpg');
            }
        }

        .login-form-3 .btnSubmit {
            font-weight: 600;
            color: #0062cc;
            background-color: #fff;
        }

        .login-form-3 h3 {
            text-align: center;
            color: #fff;
        }

        .login-form-1 h3 {
            text-align: center;
            color: #fff;
        }

        .login-form-3 {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }

    </style>
    <body >

<?php
 $emailmsg="";
 $pasdmsg="";
 $msg="";

 $ademailmsg="";
 $adpasdmsg="";


 if(!empty($_REQUEST['ademailmsg'])){
    $ademailmsg=$_REQUEST['ademailmsg'];
 }

 if(!empty($_REQUEST['adpasdmsg'])){
    $adpasdmsg=$_REQUEST['adpasdmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $pasdmsg=$_REQUEST['pasdmsg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>



<div class="container login-container">
    <div class="row">
        <!-- Display error or success message -->
        <h4><?php echo $msg?></h4>
    </div>
    <div class="row">
        <!-- Admin Login Form -->
        <div class="col-md-6 login-form-3">
            <h3>Admin Login</h3>
            <form action="loginadmin_server_page.php" method="get">
                <div class="form-group">
                    <!-- Input field for admin email -->
                    <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                </div>
                <!-- Display red error message if admin email is invalid -->
                <Label style="color:red">*<?php echo $ademailmsg?></label>
                <div class="form-group">
                    <!-- Input field for admin password -->
                    <input type="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                </div>
                <!-- Display red error message if admin password is invalid -->
                <Label style="color:red">*<?php echo $adpasdmsg?></label>
                <div class="form-group">
                    <!-- Login button for admin -->
                    <button type="submit" class="btn btnSubmit">Login</button>
                </div>
                <!-- The Forget Password link is commented out -->
                <!-- <div class="form-group">
                    <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                </div> -->
            </form>
        </div>
        <!-- Student Login Form -->
        <div class="col-md-6 login-form-1">
            <h3>Student Login</h3>
            <form action="login_server_page.php" method="get">
                <div class="form-group">
                    <!-- Input field for student email -->
                    <input type="email" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                </div>
                <!-- Display red error message if student email is invalid -->
                <Label style="color:red">*<?php echo $emailmsg?></label>
                <div class="form-group">
                    <!-- Input field for student password -->
                    <input type="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                </div>
                <!-- Display red error message if student password is invalid -->
                <Label style="color:red">*<?php echo $pasdmsg?></label>
                <div class="form-group">
                    <!-- Login button for student -->
                    <button type="submit" class="btn btnSubmit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>




        

<script>
        function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(portion).style.display = "block";
        }
    </script>
    </body>
</html>