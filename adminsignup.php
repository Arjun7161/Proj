<?php
session_start();
require 'includes/db.php';
if(!isset($_SESSION['adminid'])){
    header('location:home.php');
 }

if(isset($_POST['submit'])){
$adminid=mysqli_real_escape_string($conn,$_POST['adminid']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$pass=md5($_POST['password']);
$cpass=md5($_POST['cpassword']);

$s="select*from admin where email='$email' && passwords='$pass'";
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)>0){
    $error[]='Already exist';

}else{
    if($pass !=$cpass){
        $error[]='Incorrect Password';

    }else{
        $insert="INSERT INTO admin (adminid,email,passwords)VALUES('$adminid','$email','$pass')";
        mysqli_query($conn,$insert);
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
    <title>Admin Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
        <div class="signup-container">
        <div class="signup">
            <form action="" method="post">
            <h1>Sign Up</h1>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error"> '.$error.' </span>';
                };
            };
            ?>
                    <label>Admin ID</label>
                    <input type="text" name="adminid" placeholder="Admin ID" required>
                    <label>Email ID</label>
                    <input type="text" name="email" placeholder=" Enter Email"  required>
                    <label>Password</label>
                    <input type="password" name="password" placeholder=" Enter Password" required>
                    <label> Confirm Password</label>
                    <input type="password" name="cpassword" placeholder=" Confirm Password" required>
                    <button type="submit" name="submit" class="btn btn-primary"> Sign Up </button>
                    <p>Already Signed Up? <a href="adminlogin.php">Log In</a></p>
                </form>
</div>
</div>
    </section>
</body>
</html>