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
    $error[]='student Id  already exist';

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
                    <label>Student ID</label>
                    <input type="text" name="studentid" placeholder="Student ID" required>
                    <label>Email ID</label>
                    <input type="text" name="email" placeholder=" Enter Email"  required>
                    <label>Password</label>
                    <input type="password" name="password" placeholder=" Enter Password" required>
                    <label> Confirm Password</label>
                    <input type="password" name="cpassword" placeholder=" Confirm Password" required>
                    <button type="submit" name="submit" class="btn btn-primary"> Sign Up </button>
                </form>
</div>
</div>
    </section>
</body>
</html>