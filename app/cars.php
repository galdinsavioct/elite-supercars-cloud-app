<?php
include 'config/db.php';

$cars = mysqli_query($conn, "SELECT * FROM cars ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Cars - Elite Supercars</title>
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
        <a href="booking.php">Book Test Drive</a>
        <a href="login.php" class="login-btn">Login</a>
    </nav>
</header>

<h2 class="collection-title">Available Supercars</h2>

<section class="premium-cars">

<?php while($car = mysqli_fetch_assoc($cars)){ ?>

    <div class="premium-card">
        <img src="uploads/<?php echo $car['image']; ?>">

        <div class="premium-info">
            <h3><?php echo $car['car_name']; ?></h3>
            <p><?php echo $car['price']; ?></p>
        </div>
    </div>

<?php } ?>

</section>

</body>
</html>