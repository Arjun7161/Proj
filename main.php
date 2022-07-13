<?php
session_start();
 require 'includes/db.php';

 if(!isset($_SESSION['studentid'])){
    header('location:login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="full-page">
    <div class="navbar">
      <div>
         <p>App Name</p>
      </div>
        <nav>
            <ul id='links'>
            <p>hello <?php echo $_SESSION['studentid']?></p>
                <li><a href="main.php">Home</a></li>
                <li><a href="upload.php">Upload File</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        </div>
    </div>

</body>
</html>