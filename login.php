<?php
session_start();
require 'includes/db.php';
if(isset($_SESSION['studentid'])){
    header('location:main.php');
 }

if(isset($_POST['submits'])){
$studentid=mysqli_real_escape_string($conn,$_POST['studentid']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$pass=md5($_POST['password']);

$s="select*from students where email='$email' && passwords='$pass'";
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)>0){
   $row=mysqli_fetch_array($result);
   if($row['studentid']==$studentid){
    $_SESSION['studentid']=$row['studentid'];
    header('location:main.php');
   }else{
    header('location:home.php');
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
    <title>Log In</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="banner">
    <div class="navbar">
        <img src="Img/iReview.png"  class="logo" alt="logo">
    </div>
    <div class="content">
        <form action="" method="post">
                <h2>Log In</h2><br>
                <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error"> '.$error.' </span>';
                };
            };
            ?>
                <label>Student ID</label><br>
                <input type="text" name="studentid"  placeholder="Student ID" required><br>
                <label>Email</label><br>
                <input type="text" name="email"  placeholder="Email" required><br>
                <label>Password</label><br>
                <input type="password" name="password"  placeholder=" Enter Password" required><br>
                <button type="submit" name="submits" class="btn btn-primary"> Log In </button>
                <p>New User? <a href="signup.php">Sign Up</a></p>
        </form>
</div>
    </div>
</section>
</body>
</html>