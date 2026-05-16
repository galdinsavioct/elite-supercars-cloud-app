<?php
session_start();
include 'config/db.php';

$message = "";

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) > 0) {

        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: admin/dashboard.php");
                exit();
            } else {
                header("Location: user_dashboard.php");
                exit();
            }

        } else {
            $message = "Invalid Password!";
        }

    } else {
        $message = "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Elite Supercars</title>
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
        <a href="register.php" class="gold-btn">Register</a>
    </nav>

</header>

<div class="form-container">

    <h2>User Login</h2>

    <p class="message"><?php echo $message; ?></p>

    <form method="POST">

        <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" name="login" class="form-btn">
            Login
        </button>

    </form>

</div>

</body>
</html>