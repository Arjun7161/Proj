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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
        .my-col p {
            font-size: 30px;
            text-align:center;
        }
        .my-col{
            text-align:center;
            
        }
        .my-col label {
            text-align:center;
            display:grid;
            width: 30%;
            padding: 10px 15px;
            font-size: 20px;
            margin: 8px 0;
        }
        .my-col input{
            width:30%;
        }
        .my-row1{
            display:contents;
            justify-content: left;
        }
        .my-row h1{
            font-size:20px;
        }
        .navbar{
            height: 2%;
            display: flex;
            align-items: center;
        }
        .navbar a{
            color: black;
        }
        nav{
            flex: 1;
            text-align: right;
            font-family: 'Fredoka One', cursive;
            color: black !important;
        }
        nav ul li{
            list-style: none;
            display: inline-block;
            margin-left: 40px;
        }
        nav ul li a{
            text-decoration: solid;
            color: black;
            font-size: 20px;
        }

        body{
            background-color: rgb(244, 240, 255);
        }
    </style>

<div class="container my-container">
    <div class="row my-row1 ">
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="upload.php">Upload File</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        </div>
    </div>
    <div class="row my-row">
        <div class="col my-col">
        <h1>Welcome <?php echo $_SESSION['studentid']; ?> </h1>
    <?php
    $student=$_SESSION['studentid'];
    $sql="SELECT * from upload WHERE studentid!= $student order by rand() LIMIT 1 ";
    $query=mysqli_query($conn,$sql);
    while($ro=mysqli_fetch_array($query)){
        $rostudentid=$ro['studentid'];
        ?>
        <embed type="application/pdf" src="uploads/<?php echo $ro['file'];?>" width="900" height="600">
        <?php
    }
    ?>
    <?php
$conn= mysqli_connect('localhost','root','','user');
if (isset($_POST['upload'])) {
    $writing=$_POST['writing'];
    $presentation=$_POST['presentation'];
    $content=$_POST['content'];
    $reference=$_POST['reference'];
    $student=$_SESSION['studentid'];

    $s="select * from grade WHERE assessed_by= '$student'";
    $result=mysqli_query($conn,$s);
    if(mysqli_num_rows($result)>2){
    $error[]='Already graded three submissions';
    }else{
        $sw="select * from grade WHERE assessed_by= '$student' && uploaded_by='$rostudentid'";
        $results=mysqli_query($conn,$sw);
    if(mysqli_num_rows($results)>0){
    $error[]='Already graded this submissions';
}else{
    $sr="select * from grade WHERE uploaded_by='$rostudentid'";
    $resul=mysqli_query($conn,$sr);
if(mysqli_num_rows($results)>2){
$error[]='This submissions has been graded three times';
    

    }
else{


    $sq="INSERT INTO grade (assessed_by,uploaded_by,writing,presentation,content,reference) values('$student','$rostudentid','$writing','$presentation','$content','$reference')";
    mysqli_query($conn,$sq);
    header('location:main.php');
}
    }
}
};
?>
   
    </div>
    <div class="col my-col align-self-center">
    <form action="" method="POST">
            <p>GRADING</p>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error"> '.$error.' </span>';
                };
            };
            ?>
            <label>Writing:</label>
            <input type="number" name="writing" value="0" min="0" max="5" step="1" required><br>
            <label>Presentation:</label>
            <input type="number" name="presentation" value="0" min="0" max="5" step="1" required><br>
            <label>Content:</label>
            <input type="number" name="content" value="0" min="0" max="5" step="1" required><br>
            <label>Reference:</label>
            <input type="number" name="reference" value="0" min="0" max="5" step="1" required><br><br>
            <button type="submit" name="upload">Upload Grade</button>
    </form>
    </div>
    </div>

    </div>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
