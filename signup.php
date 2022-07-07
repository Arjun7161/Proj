<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
        <div class="signup-container">
        <div class="signup">
            <h1>Sign Up</h1>
            <form action="signinc.php" method="post">
                    <label>Username</label>
                    <input type="text" name="studentid" placeholder="Student ID" required>
                    <label>Email ID</label>
                    <input type="text" name="email" placeholder=" Enter Email"  required>
                    <label>Password</label>
                    <input type="password" name="password" placeholder=" Enter Password" required>
                    <label> Confirm Password</label>
                    <input type="password" name="cpassword" placeholder=" Confirm Password" required>
                <button type="submit" class="btn btn-primary"> Sign Up </button>
                </form>
</div>
</div>
    </section>
</body>
</html>