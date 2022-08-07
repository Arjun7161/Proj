<?php
require 'includes/db.php';

$up=$_GET['up'];
$as=$_GET['as'];
$conn= mysqli_connect('localhost','root','','user');
$sql="DELETE from grade
WHERE uploaded_by=$up and assessed_by=$as";
$result=mysqli_query($conn,$sql);
if ($result){
    header("location:adminresult.php");
}
else{
    echo "Error while Deleting";
}
    
?>