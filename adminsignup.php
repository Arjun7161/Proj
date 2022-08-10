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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="banner">
<div class="navbar">
    <img src="Img/200.png"  class="logo" alt="logo">
    <h2>Welcome <?php echo $_SESSION['adminid']; ?></h2>
            <ul>
            
                <li><a href="adminmain.php">Home</a></li>
                <li><a href="create.php">Create Table</a></li>
                <li><a href="viewtable.php">View Upload Table</a></li>
                <li><a href="adminresult.php">View Result Table</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>


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
                    <label>Admin ID</label><br>
                    <input type="text" name="adminid" placeholder="Admin ID" required><br>
                    <label>Email ID</label><br>
                    <input type="text" name="email" placeholder=" Enter Email"  required><br>
                    <label>Password</label><br>
                    <input type="password" name="password" placeholder=" Enter Password" required><br>
                    <label> Confirm Password</label><br>
                    <input type="password" name="cpassword" placeholder=" Confirm Password" required><br>
                    <button type="submit" name="submit" class="btn btn-primary"> Sign Up </button>
                </form>
</div>
</div>
</body>
</html>