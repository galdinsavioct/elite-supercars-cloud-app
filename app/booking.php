<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config/db.php';

$message = "";

if(isset($_POST['book'])){

    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $car_name = mysqli_real_escape_string($conn, $_POST['car_name']);

    $insert = mysqli_query($conn, "INSERT INTO bookings(user_name, email, car_name)
    VALUES('$user_name', '$email', '$car_name')");

    if($insert){
        $message = "Test Drive Booking Successful!";
    }else{
        $message = "Booking Failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Test Drive - Elite Supercars</title>
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
        <a href="cars.php">Cars</a>
        <a href="login.php" class="login-btn">Login</a>
    </nav>

</header>

<div class="form-container">

    <h2>Book Test Drive</h2>

    <p class="message"><?php echo $message; ?></p>

    <form method="POST">

        <div class="form-group">
            <input type="text" name="user_name" placeholder="Your Name" required>
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <input type="text" name="car_name" placeholder="Car Name" required>
        </div>

        <button type="submit" name="book" class="form-btn">
            Book Test Drive
        </button>

    </form>

</div>

</body>
</html>