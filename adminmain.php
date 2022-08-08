<?php
session_start();
 require 'includes/db.php';

 if(!isset($_SESSION['adminid'])){
    header('location:home.php');
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
    <div class="hero">  
            <nav>
            <h2 class="logo">i<span>Review</span></h2>
                <ul>
                    <h1>Welcome <?php echo $_SESSION['adminid']; ?></h1>
                <li><a href="adminmain.php">Home</a></li>
                <li><a href="create.php">Create Table</a></li>
                <li><a href="viewtable.php">View Upload Table</a></li>
                <li><a href="adminresult.php">View Result Table</a></li>
                <li><a href="adminsignup.php">Sign Up</a></li>
                <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </div>

</body>
</html>