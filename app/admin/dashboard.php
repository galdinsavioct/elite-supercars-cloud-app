<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Elite Supercars</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header class="topbar">

    <div class="brand">
        <div class="car-line">⌁</div>
        <h2>ELITE SUPERCARS ADMIN</h2>
    </div>

    <nav>
        <a href="../index.php">Home</a>
        <a href="add_car.php">Add Car</a>
        <a href="manage_cars.php">Manage Cars</a>
        <a href="bookings.php">Bookings</a>
        <a href="../logout.php" class="login-btn">Logout</a>
    </nav>

</header>

<div class="dashboard">

    <h1>Welcome Admin, <?php echo $_SESSION['fullname']; ?></h1>

    <p>
        Manage luxury supercars, bookings, and dealership operations.
    </p>

    <br><br>

    <a href="add_car.php" class="main-btn">
        Add Supercar
    </a>

    <a href="manage_cars.php" class="outline-btn">
        Manage Cars
    </a>

</div>

</body>
</html>