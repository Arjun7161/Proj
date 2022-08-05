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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
    <div class="login-container">
        <form action="" method="post">
            <div class="login">
                <h1>Log In</h1>
                <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error"> '.$error.' </span>';
                };
            };
            ?>
                <label>Admin ID</label>
                <input type="text" name="adminid"  placeholder="Admin ID" required>
                <label>Email</label>
                <input type="text" name="email"  placeholder="Email" required>
                <label>Password</label>
                <input type="password" name="password"  placeholder=" Enter Password" required>
                <button type="submit" name="submits" class="btn btn-primary"> Log In </button>
            </div>
        </form>

    </div>
</section>
</body>
</html>