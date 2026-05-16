<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - Elite Supercars</title>
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
        <a href="cars.php">View Cars</a>
        <a href="booking.php">Book Test Drive</a>
        <a href="logout.php" class="login-btn">Logout</a>
    </nav>

</header>

<div class="dashboard">

    <h1>Welcome, <?php echo $_SESSION['fullname']; ?></h1>

    <p>Explore premium supercars and book your test drive with Elite Supercars.</p>

    <br>

    <a href="cars.php" class="main-btn">View Cars</a>

    <a href="booking.php" class="outline-btn">Book Test Drive</a>

</div>

</body>
</html>