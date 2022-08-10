<?php
session_start();
require 'includes/db.php';
if(isset($_SESSION['adminid'])){
    header('location:home.php');
 }

if(isset($_POST['submits'])){
$adminid=mysqli_real_escape_string($conn,$_POST['adminid']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$pass=md5($_POST['password']);

$s="select*from admin where email='$email' && passwords='$pass'";
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)>0){
   $row=mysqli_fetch_array($result);
   if($row['adminid']==$adminid){
    $_SESSION['adminid']=$row['adminid'];
    header('location:adminmain.php');
   }else{
    header('location:adminlogin.php');
   }
}
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log In</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="banner">
    <div class="navbar">
        <img src="Img/200.png"  class="logo" alt="logo">
    </div>
    <div class="content">
        <form action="" method="post">
            <h2>Log In <style> h2 {color: white;}</style></h2><br>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error"> '.$error.' </span>';
                };
            };
            ?>
                <label>Admin ID</label><br>
                <input type="text" name="adminid"  placeholder="Admin ID" required><br>
                <label>Email ID</label><br>
                <input type="text" name="email"  placeholder="Email" required><br>
                <label>Password</label><br>
                <input type="password" name="password"  placeholder=" Enter Password" required><br>
                <button type="submit" name="submits" class="btn btn-primary"> Log In </button>
        </form>
    </div>

</div>

</body>
</html>