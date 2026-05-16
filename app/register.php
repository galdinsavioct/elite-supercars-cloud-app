<?php
include 'config/db.php';
$message = "";

if(isset($_POST['register'])){
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){
        $message = "Email already exists!";
    }else{
        $insert = mysqli_query($conn,"INSERT INTO users(fullname,email,password) VALUES('$fullname','$email','$password')");
        $message = $insert ? "Registration Successful!" : "Registration Failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<header class="topbar">
    <div class="brand">
        <div class="car-line">⌁</div>
        <h2>ELITE SUPERCARS</h2>
    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="login.php" class="login-btn">Login</a>
    </nav>
</header>

<div class="form-container">
    <h2>Create Account</h2>

    <p class="message"><?php echo $message; ?></p>

    <form method="POST">
        <div class="form-group">
            <input type="text" name="fullname" placeholder="Full Name" required>
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" name="register" class="form-btn">Register</button>
    </form>
</div>

</body>
</html>