<!DOCTYPE html>
<html>

<head>
    <title>Credits</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
       
   body {

    animation: changeBackground 20s infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-size: cover; /* Cover the entire background area */
    background-repeat: no-repeat; /* Prevent background image from repeating */
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

        
        .image-container {
            display: flex;
            flex-direction: column; /* Display images and buttons vertically */
            align-items: center; /* Center images and buttons horizontally */
            width: 600px; /* Adjust the width as per your requirements */
        }

        .image-container img {
            max-width: 250px; /* Adjust the image size as per your requirements */
            height: auto;
            margin-bottom: 20px; /* Added some space between images and buttons */
        }

        .facebook-button {
            display: inline-block;
            background-color: #3b5998; /* Facebook blue color */
            color: #fff; /* Text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none; /* Remove underline on link */
            margin-bottom: 20px; /* Added some space between buttons */
        }

        .facebook-button:hover {
            background-color: #2d4373; /* Darker shade on hover */
        }
    </style>
</head>

<body>
    <div class="image-container">
        <img src="Images/niha.jpg" alt="Niha Image">
        <a href="https://www.facebook.com/profile.php?id=100066608313990&mibextid=LQQJ4d" class="facebook-button">Tahiya Tahsin</a>
        <img src="Images/abeg1.png" alt="Abeg Image">
        <a href="https://www.facebook.com/aryanahnafabeg/" class="facebook-button">Aryan Ahnaf Abeg</a>
        
        <!-- New button to go to admin.php -->
        <a href="admin_service_dashboard.php" class="facebook-button">Go to Admin Page</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
