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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="banner">
    <div class="navbar">
    <img src="Img/iReview.png"  class="logo" alt="logo">
    <h2>Welcome <?php echo $_SESSION['adminid']; ?></h2>
            <ul>
            
                <li><a href="adminmain.php">Home</a></li>
                <li><a href="create.php">Create Table</a></li>
                <li><a href="viewtable.php">View Upload Table</a></li>
                <li><a href="adminresult.php">View Result Table</a></li>
                <li><a href="adminsignup.php">Sign Up</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>


    </div>    
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>