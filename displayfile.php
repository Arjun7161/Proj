<?php
session_start();
require 'includes/db.php';
require 'uploadval.php';

if(!isset($_SESSION['studentid'])){
    header('location:login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Welcome <?php echo $_SESSION['studentid']; ?> </h1>
<div class="dis">
    <?php
    $sql="SELECT * from upload order by rand() LIMIT 1 ";
    $query=mysqli_query($conn,$sql);
    while($ro=mysqli_fetch_array($query)){
        ?>
        <embed type="application/pdf" src="uploads/<?php echo $ro['file'];?>" width="900" height="650">
        <iframe src="uploads/<?php echo $ro['file'];?>" width="900" height="650">
        <?php
    }
    ?>
   </div>
</body>
</html>
