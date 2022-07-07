<?php
session_start();
$con= mysqli_connect('localhost','root','');

mysqli_select_db($con,'students');
$studentid=$_POST['studentid'];
$pass=$_POST['password'];

$sq="select* from student where studentid='$studentid'&& pwd ='$pass'";

$result = mysqli_query($con,$sq);

$num=mysqli_num_rows($result);

if($num == 1){
    $_SESSION['username'] =$studentid;
    header('location:main.php');
}else{
   header('location:login.php');
}
?>