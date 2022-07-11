<?php
$conn= mysqli_connect('localhost','root','','user');
if (isset($_POST['submit'])) {
    $file=$_FILES['file'];
    $student=$_POST['names'];

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt= explode('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));

    $allowed= array('pdf','docx');

    if (in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if ($fileSize < 5000000){
                $fileNameNew= uniqid('').".".$fileActualExt;
                $fileDestination='uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $sql="insert into upload values ('$student','$fileNameNew')";
                mysqli_query($conn,$sql);
                header("location:upload.php");

            }else{
                echo "File is too big";
            }

        }else{
            echo "Error while uploading";
        }

    }else{
        echo "File type Not allowed!";
    }
}