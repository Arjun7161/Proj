<?php
session_start();
require 'includes/db.php';
if(!isset($_SESSION['adminid'])){     
    header('location:home.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Table</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="banner">
<div class="navbar">
<img src="Img/200.png"  class="logo" alt="logo">
<h2>Welcome <?php echo $_SESSION['adminid']; ?></h2>
        
        
            <nav>
                <ul>

                <li><a href="adminmain.php">Home</a></li>
                <li><a href="create.php">Create Table</a></li>
                <li><a href="adminresult.php">View Grades </a></li>
                <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <?php
            $s="show tables where Tables_in_user!='admin' and Tables_in_user!= 'students' and Tables_in_user!= 'grade' ";
            $view=mysqli_query($conn,$s);
        ?>
       

        <p>Select Course:<style>p{color:white};</style></p>
        <form action="" method="POST">
        <select name="course">
          <?php
          while($rows=mysqli_fetch_array($view)){
            ?>
            <option value="<?php echo $rows['Tables_in_user'];?>"><?php echo $rows['Tables_in_user'];?></option>
            <?php
          }  
          ?>
          <input type="submit" value="View Table" name="submit">
        </select>
        </form>

    <h2>Student Upload File Table <style>h2{color:white};</style></h2>
    <table class="table">
        <th>
            <tr>
                <th> Student ID</th>
                <th> File Name</th>
            </tr>
        </th>
        <tbody>
            <?php
            if(isset($_POST['submit'])){
                if(!empty($_POST['course'])){
                    $cou=($_POST['course']);
            $conn= mysqli_connect('localhost','root','','user');
            $sql="SELECT studentid,filename from $cou";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                echo"<tr>
                <td>". $row["studentid"] ."</td>
                <td>". $row["filename"] ."</td>
            </tr>";

            }
        }

    }
            
            ?>
        </tbody>
    </table>
        </div>
</body>
</html>