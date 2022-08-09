<?php
session_start();
 require 'includes/db.php';

 if(!isset($_SESSION['studentid'])){
    header('location:home.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="full-page">
        <div class="navbar">
        <img src="Img/iReview.png" alt="logo">
            <h2>IReview</h2>
            <nav>
                <ul id='MenuItems'>
                <h1>Welcome <?php echo $_SESSION['studentid']; ?> </h1>
                <li><a href="main.php">Home</a></li>
                <li><a href="upload.php">Upload File</a></li>
                <li><a href="displayfile.php">Grading</a></li>
                <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <?php
            $s="show tables where Tables_in_user = 'grade' ";
            $view=mysqli_query($conn,$s);
        ?>
       

        <p>Select Course:</p>
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

    <h2>Student Result </h2>
    <table class="table">
        <th>
            <tr>
                <th> Writing</th>
                <th> Presentation</th>
                <th> Content</th>
                <th> Reference</th>
                <th> Final Grade</th>
            </tr>
        </th>
        <tbody>
            <?php
            
            if(isset($_POST['submit'])){
                if(!empty($_POST['course'])){
                    $cou=($_POST['course']);
            $conn= mysqli_connect('localhost','root','','user');
            $student=$_SESSION['studentid'];
            $sql="SELECT writing, presentation, content , reference , (writing+ presentation+  content + reference)as finalgrade from $cou
            WHERE uploaded_by= $student" ;
            
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                echo"<tr>
                <td>". $row["writing"] ."</td>
                <td>". $row["presentation"] ."</td>
                <td>". $row["content"] ."</td>
                <td>". $row["reference"] ."</td>
                <td>". $row["finalgrade"] ."</td>

            </tr>";

            }
        }

    }
            
            ?>
        </tbody>
    </table>
    
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>