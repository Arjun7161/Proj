<?php
session_start();
require 'includes/db.php';

if(isset($_POST['submit'])){
$studentid=mysqli_real_escape_string($conn,$_POST['studentid']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$pass=md5($_POST['password']);
$cpass=md5($_POST['cpassword']);

$s="select*from students where email='$email' && passwords='$pass'";
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)>0){
    $error[]='Already exist';

}else{
    if($pass !=$cpass){
        $error[]='Incorrect Password';

    }else{
        $insert="INSERT INTO students (studentid,email,passwords)VALUES('$studentid','$email','$pass')";
        mysqli_query($conn,$insert);
        header('location:login.php');
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="banner">
    <div class="navbar">
        <img src="Img/200.png"  class="logo" alt="logo">
    </div>
        <div class="content">
            <form action="" method="post">
            <h2>Sign Up <style> h2 {color: white;}</style></h2><br>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error"> '.$error.' </span>';
                };
            };
            ?>
                    <label>Student ID</label><br>
                    <input type="text" name="studentid" placeholder="Student ID" required><br>
                    <label>Email ID</label><br>
                    <input type="text" name="email" placeholder=" Enter Email"  required><br>
                    <label>Password</label><br>
                    <input type="password" name="password" placeholder=" Enter Password" required><br>
                    <label> Confirm Password</label><br>
                    <input type="password" name="cpassword" placeholder=" Confirm Password" required><br>
                    <button type="submit" name="submit" class="btn btn-primary"> Sign Up </button><br>
                    <p>Already Signed Up? <a href="login.php">Log In</a></p>
                </form>
            </div>
        </div>
</body>
</html>