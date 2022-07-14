<?php
session_start();
require 'includes/db.php';
require 'uploadval.php';

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
    <title>Display</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
        .my-col p {
            font-size: 30px;
            text-align:center;
        }
        .my-col{
            text-align:center;
            
        }
        .my-col label {
            text-align:center;
            display:grid;
            width: 30%;
            padding: 10px 15px;
            font-size: 20px;
            margin: 8px 0;
        }
        .my-col input{
            width:30%;
        }
        .my-row1{
            display:contents;
            justify-content: left;
        }
        .my-row h1{
            font-size:20px;
        }
        .navbar{
            height: 2%;
            display: flex;
            align-items: center;
        }
        .navbar a{
            color: black;
        }
        nav{
            flex: 1;
            text-align: right;
            font-family: 'Fredoka One', cursive;
            color: black !important;
        }
        nav ul li{
            list-style: none;
            display: inline-block;
            margin-left: 40px;
        }
        nav ul li a{
            text-decoration: solid;
            color: black;
            font-size: 20px;
        }
    </style>

<div class="container my-container">
    <div class="row my-row1 ">
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="upload.php">Upload File</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        </div>
    </div>
    <div class="row my-row">
        <div class="col my-col">
        <h1>Welcome <?php echo $_SESSION['studentid']; ?> </h1>
    <?php
    $student=$_SESSION['studentid'];
    $sql="SELECT * from upload WHERE studentid!= $student order by rand() LIMIT 1 ";
    $query=mysqli_query($conn,$sql);
    while($ro=mysqli_fetch_array($query)){
        ?>
        <embed type="application/pdf" src="uploads/<?php echo $ro['file'];?>" width="900" height="600">
        <?php
    }
    ?>
   
    </div>
    <div class="col my-col align-self-center">
            <p>GRADING</p>
            <label>Writing:</label>
            <input type="text" name="writing" required><br>
            <label>Presentation:</label>
            <input type="text" name="presentation" required><br>
            <label>Content:</label>
            <input type="text" name="content"  required><br>
            <label>Reference:</label>
            <input type="text" name="reference"  required><br>
    </div>
    </div>

    </div>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
