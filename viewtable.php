<?php
session_start();
require 'includes/db.php';
if(!isset($_SESSION['adminid'])){     
    header('location:adminlogin.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Table</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="full-page">
        <div class="navbar">
            <div>
                <p>App Name</p>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <h1>Welcome <?php echo $_SESSION['adminid']; ?></h1>
                <li><a href="adminmain.php">Home</a></li>
                <li><a href="create.php">Create Table</a></li>
                <li><a href="viewtable.php">View Upload Table</a></li>
                <li><a href="adminsignup.php">Sign Up</a></li>
                <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <?php
            $s="show tables where Tables_in_user!='admin' and Tables_in_user!= 'students' ";
            $view=mysqli_query($conn,$s);
            ?>
        <p>Select Course:</p>
        <select>
          <?php
          while($rows=mysqli_fetch_array($view)){
            ?>
            <option value="<?php echo $rows['Tables_in_user'];?>"><?php echo $rows['Tables_in_user'];?></option>
            <?php
          }  
          ?>
        </select>

    <h2>Student Upload File Table</h2>
    <table class="table">
        <th>
            <tr>
                <th> Student ID</th>
                <th> File Name</th>
            </tr>
        </th>
        <tbody>
            <?php
            $conn= mysqli_connect('localhost','root','','user');
            $sql="SELECT upload.studentid,upload.filename from upload";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                echo"<tr>
                <td>". $row["studentid"] ."</td>
                <td>". $row["filename"] ."</td>
            </tr>";

            }
            
            ?>
        </tbody>
    </table>
        </div>
</body>
</html>