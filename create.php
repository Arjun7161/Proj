<?php
session_start();
require 'includes/db.php';

if(!isset($_SESSION['adminid'])){     
    header('location:adminlogin.php');
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
    <title>create</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>Create Table</p>
    <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error"> '.$error.' </span>';
                };
            };
            ?>
    <form action="" method="POST">
        <label>Table Name</label>
        <input type="text" name="tablename" placeholder="Table Name" required>
        <button type="submit" name="create">Create Table</button>
    </form>



</body>
</html>