<?php
session_start();
require 'includes/db.php';
if(!isset($_SESSION['adminid'])){
    header('location:home.php');
 }

if(isset($_POST['change_password'])){
$currentPassword=md5($_POST['currentPassword']);
$password=md5($_POST['password']);
$passwordConfirm=md5($_POST['passwordConfirm']);
$adminid=$_SESSION['adminid'];
$sql="select passwords from admin where adminid='$adminid'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
if(password_verify($currentPassword,$row['passwords'])){
    if($passwordConfirm ==''){
        $error[]='Please confirm Password';
    }if($password != $passwordConfirm){
        $error[]='Passwords do not match';
    }
}
    if(!isset($error)){

        $result=mysqli_query($conn,"UPDATE admin set passwords='$password' where adminid='$adminid'");
        if($result){
            header("location:adminmain.php");
        }else{
            $error[]='Something went wrong';
        }
    }
}else{
    $error[]='Current Password does not match';
}

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
        <h2>Welcome <?php echo $_SESSION['adminid']; ?></h2>
    </div>
    <div class="content">
        <form action="" method="post">
            <h2>Log In <style> h2 {color: white;}</style></h2><br>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<p class="error"> '.$error.' </p>';
                };
            };
            ?>
                <label>Current Password</label><br>
                <input type="password" name="currentPassword"  placeholder="Current Password" required><br>
                <label>New Password</label><br>
                <input type="password" name="password"  placeholder="New Password" required><br>
                <label> Confirm New Password</label><br>
                <input type="password" name="passwordConfirm"  placeholder=" Confrim New Password" required><br>
                <button type="submit" name="change_password" class="btn btn-primary"> Change Password </button>
        </form>
    </div>

</div>

</body>
</html>