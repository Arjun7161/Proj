<?php
session_start();
header('location:main.php');
$con= mysqli_connect('localhost','root','');
$errors=array();
mysqli_select_db($con,'students');
$studentid=$_POST['studentid'];
$email=$_POST['email'];
$pass=$_POST['password'];
$cpass=$_POST['cpassword'];

$sq="select * from student where studentid='$studentid'";

$result = mysqli_query($con,$sq);

$num=mysqli_num_rows($result);

if($num == 1){
    echo"Username Already Taken";
}else{
    $conn="insert into student(studentid,email,pwd,cpwd) values('$studentid','$email','$pass','$cpass')";
    mysqli_query($con,$conn);
    echo"Signed UP";
}


?>