<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
    <div class="login-container">
            <div class="login">
                <h1>Log In</h1>
                <form action="logininc.php" method="post">
                    <label>Username</label>
                    <input type="text" name="studentid"  placeholder="Student ID" required>
                    <label>Password</label>
                    <input type="password" name="password"  placeholder=" Enter Password" required>
                <button type="submit" class="btn btn-primary"> Log In </button>
                </form>
</div>
    </div>
</section>
</body>
</html>