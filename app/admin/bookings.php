<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

$bookings = mysqli_query($conn, "SELECT * FROM bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bookings - Elite Supercars</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header class="topbar">

    <div class="brand">
        <div class="car-line">⌁</div>
        <h2>ELITE SUPERCARS ADMIN</h2>
    </div>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="add_car.php">Add Car</a>
        <a href="manage_cars.php">Manage Cars</a>
        <a href="../logout.php" class="login-btn">Logout</a>
    </nav>

</header>

<div class="table-box">

    <h2 class="section-title">Test Drive Bookings</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Car Name</th>
            <th>Booking Date</th>
        </tr>

        <?php while($booking = mysqli_fetch_assoc($bookings)){ ?>
        <tr>
            <td><?php echo $booking['id']; ?></td>
            <td><?php echo $booking['user_name']; ?></td>
            <td><?php echo $booking['email']; ?></td>
            <td><?php echo $booking['car_name']; ?></td>
            <td><?php echo $booking['booking_date']; ?></td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>