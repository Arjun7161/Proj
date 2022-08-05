<?php
session_start();
require 'includes/db.php';

if(!isset($_SESSION['studentid'])){
    header('location:home.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="full-page">
        <div class="navbar">
            <div>
                <p>App Name</p>
            </div>
            <nav>
                <ul id='MenuItems'>
                <h1>Welcome <?php echo $_SESSION['studentid']; ?> </h1>
                <li><a href="main.php">Home</a></li>
                <li><a href="upload.php">Upload File</a></li>
                <li><a href="displayfile.php">Grading</a></li>
                <li><a href="result.php">Result</a></li>
                <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
<section>
    <div class="login-container">
    <form action="uploadval.php" method="POST" enctype="multipart/form-data">
    <label for="name">Student ID :</label>
        <input type="text" name="names" id="names" required value="<?php echo $_SESSION['studentid']; ?>"><br><br>
        <input type="file" name="file">
        <button type="submit" name="submit">Upload Files</button>
    </form>
</div>
</section>
</div>
</body>
</html>