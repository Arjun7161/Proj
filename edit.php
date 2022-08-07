<?php
session_start();
require 'includes/db.php';

if(!isset($_SESSION['adminid'])){
   header('location:home.php');
}
$up=$_GET['up'];
$as=$_GET['as'];
$conn= mysqli_connect('localhost','root','','user');
$sql="SELECT assessed_by,uploaded_by,writing, presentation, content , reference from grade
WHERE uploaded_by=$up and assessed_by=$as";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $wr=$row["writing"];
    $pr=$row["presentation"];
    $co=$row["content"];
    $re=$row["reference"];
}
    
?>
<?php
if(isset($_POST['update'])){
    $up=$_POST['up'];
    $as=$_POST['as'];
    $wr=$_POST["writing"];
    $pr=$_POST["presentation"];
    $co=$_POST["content"];
    $re=$_POST["reference"];
    $result=mysqli_query($conn,"UPDATE grade set writing= '$wr',presentation='$pr',content='$co',reference='$re'
    WHERE assessed_by=$as and uploaded_by=$up");
    if ($result){
        header("location:adminresult.php");
    }
    else{
        echo"Failed to Update";
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="full-page">
        <div class="navbar">
            <div class="logo"><a href="#"><img src= "Img/Logo.jpg">
            </div>
            <nav>
                <ul id='MenuItems'>
                <h1>Welcome <?php echo $_SESSION['adminid']; ?> </h1>
                <li><a href="adminmain.php">Home</a></li>
                <li><a href="viewtable.php">View Upload Table</a></li>
                <li><a href="adminresult.php">View Result</a></li>
                <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
<section>
    <div class="login-container">
    <form action="" method="POST">
        <h2>Student Result </h2>
        <table class="table">
            <th>
                <tr>
                    <th> Assessor ID</th>
                    <td><input type="hidden" value="<?php echo "$as" ?>" name= "as" required></td>
                </tr>
                <tr>
                    <th> Student ID</th>
                    <td><input type="hidden" value="<?php echo "$up" ?>" name= "up" required></td>
                </tr>
                <tr>
                    <th> Writing</th>
                    <td><input type="text" value="<?php echo "$wr" ?>" name= "writing" required></td>
                </tr>
                <tr>
                    <th> Presentation</th>
                    <td><input type="text" value="<?php echo "$pr" ?>" name= "presentation" required></td>
                </tr>
                <tr>
                    <th> Content</th>
                    <td><input type="text" value="<?php echo "$co"; ?>" name= "content" required></td>
                </tr>
                <tr>
                    <th> Reference</th>
                    <td><input type="text" value="<?php echo "$re" ?>" name= "reference" required></td>
                </tr>
            
            <tr>
            <td><input type="submit" id="button" name="update" value="Update student result"></a></td>
        </tr>
        </th>
            <tbody>
            </form>
        </div>
</section>
</body>
</html>
