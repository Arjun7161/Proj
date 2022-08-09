<?php
session_start();
 require 'includes/db.php';

 if(!isset($_SESSION['adminid'])){
    header('location:home.php');
 }
?>
<?php

$conn= mysqli_connect('localhost','root','','user');
if(isset($_POST['create'])){
    $tablename=$_POST['tablename'];
    $c="show tables where Tables_in_user='$tablename'";
    $result=mysqli_query($conn,$c);
    if(mysqli_num_rows($result)>0){
    $error[]='Table Name Already Exist';
    }else{
    $create="CREATE TABLE $tablename ( `studentid` INT NOT NULL , `uploadedfile` VARCHAR(255) NOT NULL , `uploadedfilename` VARCHAR(255) NOT NULL , PRIMARY KEY (`studentid`))";
    mysqli_query($conn,$create);
    header('location:create.php');
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
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
    <div class="content">
        <p>Create Table</p><br>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error"> '.$error.' </span>';
            };
        };
        ?>
            <form action="" method="POST">
                <label>Table Name</label>
                <input type="text" name="tablename" placeholder="Table Name" required><br>
                <button type="submit" name="create">Create Table</button>
            </form>
    </div>
    <footer class="footer">
    <p>copyright</p>
</footer>
</div>


</body>
</html>