<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM cars WHERE id=$id");
    header("Location: manage_cars.php");
    exit();
}

$cars = mysqli_query($conn, "SELECT * FROM cars ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Cars - Elite Supercars</title>
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
        <a href="bookings.php">Bookings</a>
        <a href="../logout.php" class="login-btn">Logout</a>
    </nav>

</header>

<div class="table-box">

    <h2 class="section-title">Manage Supercars</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Car Name</th>
            <th>Model</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php while($car = mysqli_fetch_assoc($cars)){ ?>

        <tr>
            <td><?php echo $car['id']; ?></td>

            <td>
                <img src="../uploads/<?php echo $car['image']; ?>" width="100" height="60" style="object-fit:cover; border-radius:6px;">
            </td>

            <td><?php echo $car['car_name']; ?></td>

            <td><?php echo $car['model']; ?></td>

            <td><?php echo $car['price']; ?></td>

            <td>
                <a class="main-btn" href="manage_cars.php?delete=<?php echo $car['id']; ?>">
                    Delete
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>